<?php
class Offer_model extends Base_model{

    function __construct()
    {

    }

    public function getAllOffersFromShop(int $shop_id){
        if (!empty($db)) {
            $stmt = $db->query("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, product.name AS product_name FROM offers INNER JOIN product ON offers.product_id=product.product_id WHERE offers.shop_id=?;");
            $stmt->bind_param("i", $shop_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $AllShopOffers = array();
            $i = 0;

            while($row = $result->fetch_assoc()){
                $AllShopOffers[$i] = array('id'=>$row['offer_id'], 'user_id'=>$row['user_id'], 'product_id'=>$row['product_id'], 'price'=>$row['price'], 'valid'=>$row['valid'],'likes'=>$row['likes'],'dislikes'=>$row['dislikes'],'name'=>$row['product_name']);
                $i++;
            }
            return $AllShopOffers;
        }
    }

    public function getFilteredOffers(int $shop_id, int $category_id){
        if (!empty($db)) {
            $stmt = $db->query("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, product.name AS product_name FROM offers INNER JOIN product ON offers.product_id=product.product_id WHERE offers.shop_id=? AND offers.category_id=?;");
            $stmt->bind_param("ii", $shop_id, $category_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $filteredOffers = array();
            $i = 0;

            while($row = $result->fetch_assoc()){
                $filteredOffers[$i] = array('id'=>$row['offer_id'], 'user_id'=>$row['user_id'], 'product_id'=>$row['product_id'], 'price'=>$row['price'], 'valid'=>$row['valid'],'likes'=>$row['likes'],'dislikes'=>$row['dislikes'],'name'=>$row['product_name']);
                $i++;
            }
            return $filteredOffers;
        }
    }

}