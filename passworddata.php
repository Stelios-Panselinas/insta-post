<?php
    $servername = "localhost";
    $username = "root";
    $password= "";
    $dname = "eshop";
    
    $conn = new mysqli($servername, $username, $password, $dname);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $conn->connect_error;
    }

$password=$_GET['password'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];


    $sql = ("INSERT into user (first_name, last_name, password, email) Values (?, ?, ?, ?);");
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $first_name, $last_name, $password, $email);
    $stmt->execute();

    $

$userData = array(
    'email'=>$email,
    'user_id'=>$userData['user_id'],
    'logged_in'=>true);
session_start();
$_SESSION['userData'] = $userData;
$data = [];
header("Location: userHome");

    $conn = null;
?>