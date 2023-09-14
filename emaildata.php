<?php
require_once 'includes/PageController.php';
$pageController = new PageController();
    $host = 'localhost';
    $db_name = 'eshop';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $conn->connect_error;
    }

    $email = $_GET['email'];
    $password=$_GET['password'];

    $sql = "SELECT password, user_id FROM user WHERE email=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
    if(!empty($userData) && $userData['password'] == $password){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $userData['user_id'];
        $_SESSION['logged_in'] = true;
        $data = [];
        $pageController->renderPage('userHome', $data);
    }else{
        echo 'Invalid email or password!';
    }
?>