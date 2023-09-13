<?php
    $username = "localhost";
    $username = "root";
    $password= "";
    $dname = "eshop";
    
    $conn = new mysqli($servername, $username, $password, $dname);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $connect_error);
    }

    $sql = "SELECT email FROM user WHERE email=? ";
    $stmt = $conn->prepare($sql);
    $stmt->$execute($sql);
    $result = $conn->query($sql);
    
    if ($conn->query($sql) === TRUE) {
        echo "To email υπαρχει.";
        
    } else {
        echo "Το email δεν υπαρχει.";
        
    } 

    $conn=null
?>