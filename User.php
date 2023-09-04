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

    public function showData($user_id){
        $host = 'localhost';
        $db_name = 'eshop';
        $username = 'root';
        $password = '';
        $db = new mysqli($host, $username, $password, $db_name);;

        $stmt = $db->prepare('SELECT product_name, entry_datetime, interaction FROM interactions INNER JOIN offers ON interaction.offer_id = offers.offer_id INNER JOIN product ON product.product_id = offers.product_id WHERE user_id=?');
        $stmt->bind_param("i", $user_id);
        if (!$stmt->execute()) {
            echo("Execute failed: " . $stmt->error);
        }
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
            $output_array = $output_array + "<tr>
                              <td>"+$i+"</td>
                              <td>"+$row["product_name"]+"</td>
                              <td>"+$row["entry_datetime"]+"</td>
                              <td>"+$row["interaction"]+"</td>
                            </tr>";
            $i++;
        }
        $output_array = $output_array + '</tbody>';
        echo $output_array;
    }
}

$user = new User();
if ($_GET['function'] == "updateUsername") {
    $user_id = 1; //$_SESSION
    $username = $_GET['username'];
    $user = new User();
    $user->updateUsername($username, $user_id);
}elseif ($_GET['function'] == 'updatePassword'){
    $user_id = 1;
    $password = $_GET['newPassword'];
    $user = new User();
    $user->updatePassword($user_id, $password);
}elseif ($_GET['function'] == 'validateOldPassword'){
    $user_id = 1;
    $oldPassword = $_GET['oldPassword'];
    $user = new User();
    $user->validateOldPassword($oldPassword,$user_id);
}elseif ($_GET['function'] == 'showData'){
    $user_id = 1;
    $user = new User();
    $user->showData($user_id);
}