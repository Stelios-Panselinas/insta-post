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
  


  $sql = "SELECT first_name, last_name, cur_tokens, total_tokens FROM user ORDER BY total_tokens desc ";
  $result = $conn->query($sql);
  
  
  if ($result->num_rows > 0) {
  
  $i = 0;
  $output_array = array();

  while($row = $result->fetch_assoc()){
    $output_array[$i] = array('first_name'=>$row['first_name']. " " . $row['last_name'], 'cur_tokens'=>$row['cur_tokens'], 'total_tokens'=>$row['total_tokens'] );
                           
    $i++;
  }
    echo json_encode ($output_array);

} else {
  echo "0 results";
}
?> 