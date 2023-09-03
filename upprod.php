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
  $query = "INSERT INTO product (name, prod_sub_id, initial_price) VALUES ($name,$subc,$price);
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
?>