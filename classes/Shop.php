<?php
class Shop extends Shop_model {
use Offer;

    function __construct() {

    }
    function showAllShops(){
       return $this->getAllShops();
    }

    public function createPopUp(int $shop_id, int $category_id){
        $shops = $this->getAllShops();

        foreach ($shops as $shop){
            $this
        }
    }
}

if ($_POST['function'] === 'showAllShops') {
    $result = $this->showAllShops();
    echo json_encode($result);
} elseif ($_POST['action'] === 'function2') {
    $result = $myClass->function2();
    echo json_encode($result);
}