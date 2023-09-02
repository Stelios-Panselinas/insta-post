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
  $name = $_GET['name']
  $stmt = $conn->prepare("SELECT offers.offer_id, offers.user_id, offers.product_id, offers.price, offers.valid, offers.likes, offers.dislikes, product.name AS product_name FROM offers INNER JOIN product ON offers.product_id=product.product_id WHERE offers.shop_id=?;");
  $stmt->bind_param("isd", $sub,$name,$price);
  $stmt->execute();
  $result = $stmt->get_result();
  $offers = array();
  $offer = array();
  $i = 0;
?>