<?php
require_once 'Database.php';
class Shop extends Database {
    public function addLike($offer_id, $likes){
        $this->connect();

        $stmt = $this->prepare("UPDATE offers SET likes=? WHERE offer_id=?");
        $stmt->bind_param("ii", $likes,$offer_id);
        $stmt->execute();
    }

    public  function addDislike($offer_id, $dislikes){
        $this->connect();

        $stmt = $this->prepare("UPDATE offers SET dislikes=? WHERE offer_id=?");
        $stmt->bind_param("ii", $dislikes,$offer_id);
        $stmt->execute();
    }

    public function getShopsWithoutOffers(){
        $this->connect();

        $result = $this->query("SELECT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop;");
        $shops = array();
        $i = 0;


        while($row = $result->fetch_assoc()){
            $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longtitude']);
            $i++;
        }
        $shops = json_encode($shops);
        echo $shops;
    }

    public function getShopsWithOffersCategory($category_id){
        $this->connect();


        $stmt = $this->prepare("SELECT DISTINCT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id WHERE offers.category_id=?;");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $shops = array();
        $i = 0;


        while($row = $result->fetch_assoc()){
            $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longtitude']);
            $i++;
        }
        $shops = json_encode($shops);
        echo $shops;
    }

    public function getAllShopsWithOffers(){
        $this->connect();

        $result = $this->query("SELECT DISTINCT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id;");
        $shops = array();
        $i = 0;


        while($row = $result->fetch_assoc()){
            $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longtitude']);
            $i++;
        }
        $shops = json_encode($shops);
        echo $shops;
    }
}

$shop = new Shop();
if ($_GET['function'] == "addLike") {
    $offer_id = (int)$_GET['offer_id'];
    $likes = (int)$_GET['likes'];
    $shop->addLike($offer_id, $likes);
}elseif ($_GET['function'] == "addDislike"){
    $offer_id = (int)$_GET['offer_id'];
    $dislikes = (int)$_GET['dislikes'];
    $shop->addDislike($offer_id, $dislikes);
}elseif ($_GET['function'] == 'getAllShopsWithOffers'){
    $shop->getAllShopsWithOffers();
}elseif ($_GET['function'] == 'getAllShopsWithoutOffers'){
    $shop->getShopsWithoutOffers();
}elseif ($_GET['function'] == 'getAllShopsWithOffersCategory'){
    $category_id = (int)$_GET['category_id'];
    $shop->getShopsWithOffersCategory($category_id);
}



