<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "eshop";

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $q = $_GET['q'];
  $stmt = $conn->prepare("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, product.name FROM offers INNER JOIN product ON offers.product_id=product.product_id WHERE offers.shop_id=?;");
  $stmt->bind_param("i", $q);
  $stmt->execute();
  $result = $stmt->get_result();
  $offers = array();
  $offer = array();
  $i = 0;


  while($row = $result->fetch_assoc()){
    $offers[$i] = array('id'=>$row['offer_id'], 'user_id'=>$row['user_id'], 'product_id'=>$row['product_id'], 'price'=>$row['price'], 'valid'=>$row['valid'],'likes'=>$row['likes'],'dislikes'=>$row['dislikes'],'name'=>$row['name']);
    $i++;
  }
  $offers = json_encode($offers);
  echo $offers;

?>