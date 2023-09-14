<?php
    $username = "localhost";
    $username = "root";
    $password= "";
    $dname = "eshop";
    
    $conn = new mysqli($username, $password, $dname);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $conn->connect_error;
    }

    $email = $_GET['email'];
    $password=$_GET['password'];

    $sql = "SELECT password FROM user WHERE email=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $passwordDB = $result->fetch_assoc();
    
    if ($password === $passwordDB) {
        $_SESSION->start();
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
    } else {

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