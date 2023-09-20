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
            $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longitude'=>$row['longtitude']);
            $i++;
        }
        $shops = json_encode($shops);
        echo $shops;
    }

    public function getOffersFromCategory($category_id, $shop_id){
        $this->connect();
        if ($category_id === 0){
            $stmt = $this->prepare("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, offers.entry_daytime, product.name AS product_name, user.first_name, user.last_name, user.score FROM offers INNER JOIN product ON offers.product_id=product.product_id INNER JOIN user ON user.user_id = offers.user_id WHERE offers.shop_id=?;");
            $stmt->bind_param("i", $shop_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $offers = array();
            $i = 0;
        }else{
            $stmt = $this->prepare("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, offers.entry_daytime, product.name AS product_name, user.first_name, user.last_name, user.score FROM offers INNER JOIN product ON offers.product_id=product.product_id INNER JOIN user ON user.user_id = offers.user_id WHERE offers.shop_id=? and category_id=?;");
            $stmt->bind_param("ii", $shop_id, $category_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $offers = array();
            $i = 0;
        }


        while($row = $result->fetch_assoc()){
            $offers[$i] = array('id'=>$row['offer_id'], 'user_id'=>$row['user_id'], 'product_id'=>$row['product_id'], 'price'=>$row['price'], 'valid'=>$row['valid'],'likes'=>$row['likes'],'dislikes'=>$row['dislikes'],'entry_daytime'=>$row['entry_daytime'],'name'=>$row['product_name'],'first_name'=>$row['first_name'],'last_name'=>$row['last_name'],'score'=>$row['score']);
            $i++;
        }
        $offers = json_encode($offers);
        echo $offers;
    }

    public function disableOffer($offer_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE offers SET valid = 0 WHERE offer_id = ?");
        $stmt->bind_param("i", $offer_id);
        $stmt->execute();
    }

    public function enableOffer($offer_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE offers SET valid = 1 WHERE offer_id = ?");
        $stmt->bind_param("i", $offer_id);
        $stmt->execute();
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
}elseif ($_GET['function'] == 'getOffersFromCategory'){
    $category_id = (int)$_GET['category_id'];
    $shop_id = (int)$_GET['shop_id'];
    $shop->getOffersFromCategory($category_id, $shop_id);
}elseif ($_GET['function'] === 'disableOffer'){
    $offer_id = $_GET['offer_id'];
    $shop->disableOffer($offer_id);
}elseif ($_GET['function'] === 'enableOffer'){
    $offer_id = $_GET['offer_id'];
    $shop->enableOffer($offer_id);
}



