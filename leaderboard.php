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
  


  $sql = "SELECT first_name, last_name, cur_tokens, total_tokens FROM user ORDER BY total_tokens";
  $result = $conn->query($sql);
  
  
  if ($result->num_rows > 0) {
  
  $i = -9;
  $output_array;

  while($row = $result->fetch_assoc()){
      $output_array = "<tr>
                        <td>".$i."</td>
                        <td>".$row['first_name']. " " . $row['last_name'] ."</td>
                        <td>".$row['cur_tokens']."</td>
                        <td>".$row['total_tokens']."</td>
                      </tr>";
      $i++;
  }
  echo $output_array;

} else {
  echo "0 results";
}
?> 