<?php
class PageController {
    public function renderPage($template, $data = []) {
        extract($data);

        include('templates/header.php');
        include('templates/'.$template.'.php');
        include('templates/footer.php');
    }

    public function renderPageHomePage($template, $data = []) {
        extract($data);

        include('templates/'.$template.'.php');
        include('templates/footer.php');
    }
}