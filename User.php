<?php
require_once 'Database.php';
class User extends Database {

    public function updateUsername($username, $user_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE user SET first_name=? WHERE user_id=?");
        $stmt->bind_param("si", $username, $user_id);
        $stmt->execute();
    }

    public function updatePassword($user_id, $newPass){
        $this->connect();

        $stmt = $this->prepare('UPDATE user SET password = ? WHERE user_id = ?');
        $stmt->bind_param('si', $newPass, $user_id);
        $stmt->execute();
    }

    public function validateOldPassword($oldPassword, $user_id){
        $this->connect();

        $stmt = $this->prepare('SELECT password FROM user WHERE user_id=?');
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $pass = $row['password'];
        if (strcmp($pass,$oldPassword) == 0){
            echo 'false';
        }else{
            echo 'true';
        }
    }

    public function showInteractions($user_id){
        $this->connect();

        $stmt = $this->prepare('SELECT name, entry_datetime, interaction FROM interactions INNER JOIN offers ON interactions.offer_id = offers.offer_id INNER JOIN product ON product.product_id = offers.product_id WHERE offers.user_id=?');
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 1;
        $output_array = "<thead>
                            <tr>
                              <th>#</th>
                              <th>Όνομα Προϊόντος</th>
                              <th>Ημερομηνία Αλληλεπίδρασης</th>
                              <th>Αλληλεπίδραση</th>
                            </tr>
                          </thead>
                          <tbody>";

        while($row = $result->fetch_assoc()){
            $output_array = $output_array."<tr>
                              <td>".$i."</td>
                              <td>".$row['name']."</td>
                              <td>".$row['entry_datetime']."</td>
                              <td>".$row['interaction']."</td>
                            </tr>";
            $i++;
        }
        $output_array = $output_array.'</tbody>';
        echo $output_array;
    }

    public function showHistory($user_id){
        $this->connect();

        $stmt = $this->prepare('SELECT product.name AS product_name, offers.entry_daytime, shop.name AS shop_name FROM product INNER JOIN offers ON product.product_id = offers.product_id INNER JOIN shop ON shop.id = offers.shop_id WHERE offers.user_id = ?;');
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 1;
        $output_array = "<thead>
                            <tr>
                              <th>#</th>
                              <th>Όνομα Προϊόντος</th>
                              <th>Ημερομηνία Προσφοράς</th>
                              <th>Κατάστημα</th>
                            </tr>
                          </thead>
                          <tbody>";

        while($row = $result->fetch_assoc()){
            $output_array = $output_array."<tr>
                              <td>".$i."</td>
                              <td>".$row['product_name']."</td>
                              <td>".$row['entry_daytime']."</td>
                              <td>".$row['shop_name']."</td>
                            </tr>";
            $i++;
        }
        $output_array = $output_array.'</tbody>';
        echo $output_array;
    }

    public function showRates($user_id){
        $this->connect();

        $stmt = $this->prepare("SELECT cur_tokens, total_tokens, score FROM user WHERE user_id=?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rates = array();
        $rate = $result->fetch_assoc();

        $rates = array('cur_tokens'=>$rate['cur_tokens'], 'total_tokens'=>$rate['total_tokens'], 'score'=>$rate['score']);
        $rates = json_encode($rates);

        echo $rates;
    }
}

$user = new User();
if ($_GET['function'] == "updateUsername") {
    $user_id = 1; //$_SESSION
    $username = $_GET['username'];
    $user->updateUsername($username, $user_id);
}elseif ($_GET['function'] == 'updatePassword'){
    $user_id = 1;
    $password = $_GET['newPassword'];
    $user->updatePassword($user_id, $password);
}elseif ($_GET['function'] == 'validateOldPassword'){
    $user_id = 1;
    $oldPassword = $_GET['oldPassword'];
    $user->validateOldPassword($oldPassword,$user_id);
}elseif ($_GET['function'] == 'showInteractions'){
    $user_id = 1;
    $user->showInteractions($user_id);
}elseif ($_GET['function'] == 'showHistory'){
    $user_id = 1;
    $user->showHistory($user_id);
}elseif ($_GET['function'] == 'showRates'){
    $user_id = 1;
    $user->showRates($user_id);
}