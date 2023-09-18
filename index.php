<?php

session_start();

require_once 'classes/Database.php';
require_once 'includes/PageController.php';

//$db = new Database();
$pageController = new PageController();


if (isset($_SESSION['userData']['logged_in'])) {
    $page = $_GET['page'];
} elseif($_GET['page'] === 'register.php') {
    $page = 'register';
}else{
    $page = 'login';
}



$data = [];
if($page === 'login' || $page === 'userHome' || $page === 'register'){
    $pageController->renderPageNoHeader($page, $data);
}else{
    $pageController->renderPage($page, $data);
}

//switch($page) {
//    case 'userHome':
//        $userName = "John"; // Replace with actual user data
//        $data = ['userName' => $userName];
//        $pageController->renderPage('home', $data);
//        break;
//    case 'userSearch':
//            $data = [];
//            $pageController->renderPage('userSearch', $data);
//        break;
//    default:
//        $pageController->renderPage('userHome');
//}