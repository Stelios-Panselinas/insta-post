<?php
class Shop extends Shop_model{
    public $id;
    public $name;
    public $latitude;
    public $logditude;
    public $offers;

    function __construct($id, $name, $latitude, $longitude, $offers) {
        $this->name = $name;
        $this->id = $id;
        $this->latitude = $latitude;
        $this->logditude = $longitude;
        $this->offers = $offers;
    }
    function showShopsWithoutOffer(){

    }
}

$result = $db->query("SELECT DISTINCT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id;");
while($row = $result->fetch_assoc()){
    $shops[$i] = array('id'=>$row['id'], 'name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longtitude']);
    $i++;
}
$shops = array();
$shop = array();
$i = 0;

foreach($result->fetch_assoc()['id'] as $shop_id){
    $stmt = $conn->prepare("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, product.name AS product_name FROM offers INNER JOIN product ON offers.product_id=product.product_id WHERE offers.shop_id=?;");
    $stmt->bind_param("i", $shop_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($offer = $result->fetch_assoc()){
        $offers[$i] = array('id'=>$offer['offer_id'], 'user_id'=>$offer['user_id'], 'product_id'=>$offer['product_id'], 'price'=>$offer['price'], 'valid'=>$offer['valid'],'likes'=>$offer['likes'],'dislikes'=>$offer['dislikes'],'name'=>$offer['product_name']);
        $i++;
    }
}


$shops = json_encode($shops);
echo $shops;

?>