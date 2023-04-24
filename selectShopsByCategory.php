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
  $stmt = $conn->prepare("SELECT shop.name,shop.id, shop.latitude, shop.longtitude FROM shop INNER JOIN offers ON shop.id=offers.shop_id WHERE offers.category_id=?");
  $stmt->bind_param("i", $q);
  $stmt->execute();
  $result = $stmt->get_result();
  $shops = array();
  $shop = array();
  $i = 0;


  while($row = $result->fetch_assoc()){
    $shops[$i] = array('name'=>$row['name'], 'latitude'=>$row['latitude'], 'longtitude'=>$row['longtitude']);
    $i++; 
  }
  $shops = json_encode($shops);
  echo $shops;

?>