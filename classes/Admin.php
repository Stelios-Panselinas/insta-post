<?php
require_once 'Database.php';
class  Admin extends Database{
    public function updateProduct($pname, $subCategory,$price){
        $this->connect();

        $stmt = $this->prepare("INSERT INTO product (product.product_id, product.name, product.prod_sub_id, product.initial_price ) VALUES ( DEFAULT, ?, ?, ?);");
        $stmt->bind_param("sid", $pname, $subCategory, $price);
        $stmt->execute();
    }

    public function updateShop($latit,$longt,$kname,$tupos){
        $this->connect();

        $stmt = $this->prepare("INSERT INTO shop (shop.id, shop.latitude, shop.longtitude, shop.name, shop.type) VALUES (DEFAULT, ?, ?, ?, ?);");
        $stmt->bind_param("ddss", $latit, $longt, $kname, $tupos);
        $stmt->execute();
    }

    public function statistics($startDate,$endDate){
        $this->connect();

        $stmt = $this->prepare("SELECT COUNT(offer_id) AS offers_per_day,entry_daytime FROM offers WHERE entry_daytime >= ? AND entry_daytime < ? GROUP BY entry_daytime ORDER BY entry_daytime;");
        $stmt->bind_param("ss", $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();
        $output_array = array();

        $i = 0;
        while($row = $result->fetch_assoc()){
            $output_array[$i] = array('xaxis'=>$row['offers_per_day'], 'yaxis'=> $row['entry_daytime'] );

            $i++;
        }
        echo json_encode ($output_array);
    }

    public function leaderboards(){
        $this->connect();

        $sql = "SELECT first_name, last_name, cur_tokens, total_tokens FROM user ORDER BY total_tokens desc ";
        $result = $this->query($sql);


        if ($result->num_rows > 0) {

            $i = 0;
            $output_array = array();

            while($row = $result->fetch_assoc()){
                $output_array[$i] = array('first_name'=>$row['first_name']. " " . $row['last_name'], 'cur_tokens'=>$row['cur_tokens'], 'total_tokens'=>$row['total_tokens'] );

                $i++;
            }
            echo json_encode ($output_array);

        } else {
            echo "0 results";
        }
    }

    public function deleteOffer($offer_id){
        $this->connect();

        $stmt = $this->prepare("DELETE FROM offers WHERE offer_id = ?;");
        $stmt->bind_param("i", $offer_id);
        $stmt->execute();
        header("refresh: ../adminFeedback");
    }
}

$admin = new Admin();
if ($_GET['function'] === "updateProduct") {
    $pname = $_GET['pname'];
    $subCategory = $_GET['subCategory'];
    $price = (double)$_GET['price'];
    $admin->updateProduct($pname, $subCategory, $price);
}elseif ($_GET['function'] === 'updateShop'){
    $kname = $_GET['kname'];
    $longt = (double)$_GET['longt'];
    $latit = (double)$_GET['latit'];
    $tupos = $_GET['tupos'];
    $admin->updateShop($latit,$longt,$kname,$tupos);
}elseif($_GET['function'] === 'statistics'){
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $admin->statistics($startDate,$endDate);
}elseif ($_GET['function'] === 'leaderboards'){
    $admin->leaderboards();
}elseif ($_GET['function'] === 'deleteOffer'){
    $offer_id = $_GET['offer_id'];
    $admin->deleteOffer($offer_id);
}