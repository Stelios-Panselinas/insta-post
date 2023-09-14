<?php
// index.php
require_once 'includes/Database.php';
require_once 'includes/PageController.php';

//$db = new Database();
$pageController = new PageController();

if(!empty($_SESSION['logged_in'])) {
    $page = 'userHome';
} else {
    $page = 'login';
}

$data = [];
if($page === 'login'){
    $pageController->renderPageNoHeader($page, $data);
}else{
    $pageController->renderPageNoHeader($page, $data);
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