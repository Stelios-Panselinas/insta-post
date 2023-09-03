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
  $tupos = $_POST['tname']
  $sql = "INSERT INTO shop (latitude,longtitude, name, type) VALUES ($latit,$longt,$kname,$tupos);
  mysqli_query($conn, $sql);


?> 