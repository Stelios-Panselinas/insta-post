<?php
class Shop_model extends Database {

    function __construct(){

    }

    public function getAllShops(){
        if (!empty($db)) {
            $result = $this->query("SELECT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop;");

            $shops = array();
            $i = 0;

            while($row = $result->fetch_assoc()){
                $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longitude']);
                $i++;
            }
            return $shops;
        }
    }

    public function getShopsWithOffer(){
        if (!empty($db)) {
            $result = $this->query("SELECT DISTINCT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id;");

            $shopWithOffers = array();
            $i = 0;

            while($row = $result->fetch_assoc()){
                $shopWithOffers[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longitude']);
                $i++;
            }
            return $shopWithOffers;
        }
    }

    public function getShopsWithOffersFiltered(int $category_id){
        if (!empty($db)) {
            $stmt = $this->prepare("SELECT DISTINCT shop.id, shop.name, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id WHERE offers.category_id=?;");
            $stmt->bind_param("i", $category_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $shopWithOffersFiltered = array();
            $i = 0;

            while($row = $result->fetch_assoc()){
                $shopWithOffersFiltered[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longitude']);
                $i++;
            }
            return $shopWithOffersFiltered;
        }
    }
}


