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
        $stmt = $conn->prepare("SELECT subcategory.name FROM subcategory INNER JOIN category ON category.category_id=subcategory.category_id WHERE category.category_id = ?");
        $stmt->bind_param("i", $q);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "<option value=0".">"."Επιλέξτε Υποκατηγορία"."</option>";
        $val = 1;
        while ($row = $result->fetch_assoc()) {
                echo "<option value=".$val.">".$row['name']."</option>";
                $val++;
        }
        $conn->close();
?>