<?php
class PageController {
    public function renderPage($template, $data = []) {
        extract($data);

        include('templates/header.php');
        include('templates/'.$template.'.php');
        include('templates/footer.php');
    }

    public function renderPageNoHeader($template, $data = []) {
        extract($data);

        include('templates/'.$template.'.php');
        include('templates/footer.php');

    }

    public function renderPageAdmin($template, $data = []) {
        extract($data);

        include('templates/header_admin.php');
        include('templates/'.$template.'.php');
        include('templates/footer_admin.php');
    }

    public function renderPageNoHeaderAdmin($template, $data = []) {
        extract($data);

        include('templates/'.$template.'.php');
        include('templates/footer.php');

    }
}