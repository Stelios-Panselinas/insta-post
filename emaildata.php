<?php
    $username = "localhost";
    $username = "root";
    $password= "";
    $dname = "eshop";
    
    $conn = new mysqli($servername, $username, $password, $dname);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $conn->connect_error;
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

<?php
session_start();
?>

<?php
$_SESSION["email"]= $email;
$_SESSION["user_id"]= $user_id;
if (isset($_SESSION["email"]),($_SESSION["user_id"])) {
    $email=$_SESSION["email"];
    $user_id=$_SESSION["user_id"];
} else{

}
?>