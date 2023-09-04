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
  
  $kname = $_POST['kname'];
  $longt = $_POST['mikos'];
  $latit = $_POST['platos'];
  $tupos = $_POST['tname'];


  $stmt = $conn->prepare("INSERT INTO shop.latitude, shop.longtitude, shop.name, shop.type VALUES (?, ?, ?, ?);");
  $stmt->bind_param("iiss", $latit, $longt, $kname, $tupos);
  $stmt->execute();
?> 