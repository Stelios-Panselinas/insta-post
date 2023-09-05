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
  $longt = $_POST['longt'];
  $latit = $_POST['latit'];
  $tupos = $_POST['tupos'];


  $stmt = $conn->prepare("INSERT INTO shop.latitude, shop.longtitude, shop.name, shop.type VALUES (?, ?, ?, ?);");
  $stmt->bind_param("iiss", $latit, $longt, $kname, $tupos);
  $stmt->execute();
?> 