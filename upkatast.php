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
  
  $kname = $_GET['kname'];
  $longt = (double)$_GET['longt'];
  $latit = (double)$_GET['latit'];
  $tupos = $_GET['tupos'];


  $stmt = $conn->prepare("INSERT INTO shop (shop.id, shop.latitude, shop.longtitude, shop.name, shop.type) VALUES (DEFAULT, ?, ?, ?, ?);");
  $stmt->bind_param("ddss", $latit, $longt, $kname, $tupos);
  $stmt->execute();
?> 