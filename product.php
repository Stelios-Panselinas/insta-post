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
        $stmt = $conn->prepare("SELECT product.name FROM product INNER JOIN subcategory ON product.prod_sub_id=subcategory.sub_id WHERE subcategory.name LIKE ?");
        $stmt->bind_param("s", $q);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "<option value=0".">"."Επιλέξτε Προϊόν"."</option>";
        $val = 1;
        while ($row = $result->fetch_assoc()) {
                echo "<option value=".$val.">".$row['name']."</option>";
                $val++;
        }
$conn->close();
?>