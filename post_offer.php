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
        
        $c = $_GET['c'];
        $s = $_GET['s'];
        $p = $_GET['p'];
        $pr = $_GET['pr'];
        $sh = $_GET['sh'];
        $us = $_GET['us'];
        $stmt = $conn->prepare("INSERT INTO offers (shop_id, category_id, sub_id, product_id, price, valid, user_id) VALUES (?, ?, ?, ?, ?, 1, ?);");
        $stmt->bind_param("iiiiiii", $sh, $c, $s, $p, $pr, $us);
        $stmt->execute();


?>
