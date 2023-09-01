<?php
// index.php
require_once 'includes/Database.php';
require_once 'includes/PageController.php';

$db = new Database();
$pageController = new PageController();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'userHome';
}

$data = [];
if($page === 'userHome'){
    $pageController->renderPageHomePage($page, $data);
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