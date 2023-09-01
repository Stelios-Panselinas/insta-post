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

switch($page) {
    case 'userHome':
        $userName = "John"; // Replace with actual user data
        $data = ['userName' => $userName];
        $pageController->renderPage('home', $data);
        break;
    case 'contact':
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Handle form submission
            $confirmationMessage = "Thank you for your message!";
            $data = ['confirmationMessage' => $confirmationMessage];
            $pageController->renderPage('contact', $data);
        } else {
            $pageController->renderPage('contact');
        }
        break;
    default:
        $pageController->renderPage('userHome');
}