<?php
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
}


if ($_GET['function'] == "addLike") {
    $offer_id = (int)$_GET['offer_id'];
    $likes = (int)$_GET['likes'];
    $shop = new Shop();
    $shop->addLike($offer_id, $likes);
}elseif ($_GET['function'] == "addDislike"){
    $offer_id = (int)$_GET['offer_id'];
    $dislikes = (int)$_GET['dislikes'];
    $shop = new Shop();
    $shop->addDislike($offer_id, $dislikes);
}



