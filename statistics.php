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
  

  $startDate = $_GET['startDate'];
  $endDate = $_GET['endDate'];

  $stmt = $conn->prepare('SELECT COUNT(offer_id) AS offers_per_day,entry_daytime FROM offers WHERE entry_daytime>= ? entry_daytime< ? GROUP BY entry_daytime');  
  $stmt->bind_param("ss", $startDate, $endDate);
  $stmt->execute();

  $output_array = array();

  while($row = $result->fetch_assoc()){
    $output_array[$i] = array('xaxis'=>$row['offers_per_day'], 'yaxis'=> $row['enrty_daytime'] );
                           
    $i++;
  }
    echo json_encode ($output_array);


  
?> 