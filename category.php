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

        
        $q = $_GET['q'];
        $stmt = $conn->prepare("SELECT category.category_id FROM category INNER JOIN subcategory ON category.category_id=subcategory.category_id INNER JOIN product ON subcategory.sub_id=product.prod_sub_id WHERE product.name = ?");
        $stmt->bind_param("s", $q);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
        
          echo $row['category_id'];
        
      }
      
?>

