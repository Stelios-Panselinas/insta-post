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
  


  $sql = "SELECT user_id, first_name, cur_tokens, total_tokens FROM user ORDER BY total tokens";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" .$row["user_id"]. "</td><td>" .$row["first_name"]. "</td><td>" .$row["cur_tokens"]."</td><td>" .$row["total_tokens"]. "</td></tr>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?> 