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
 
 
  
  $pname = $_GET['pname'];
  $subCategory = $_GET['subCategory'];
  $price = (double)$_GET['price'];
  $stmt = $conn->prepare("INSERT INTO product (product.product_id, product.name, product.prod_sub_id, product.initial_price ) VALUES ( DEFAULT, ?, ?, ?);");
  $stmt->bind_param("sid", $pname, $subCategory, $price);
  $stmt->execute();
?>