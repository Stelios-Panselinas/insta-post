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
 
 
  
  $name = $_POST['pname'];
  $subc = $_POST['subcategory'];
  $price = $_POST['price'];
  $stmt = $conn->prepare("INSERT INTO  product.name, product.prod_sub_id, product.initial_price VALUES (?, ?, ?);");
  $stmt->bind_param("sii", $pname, $subc, $price);
  $stmt->execute();
?>