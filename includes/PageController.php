<?php
class PageController {
    public function renderPage($template, $data = []) {
        extract($data);

        include('templates/header.php');
        include('templates/userHome.php');
        include('templates/footer.php');
    }
}