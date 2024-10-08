<?php

if (!isset($_SESSION['adminData']['logged_in'])) {
    header("Location: login");
}
?>
<html>
<head>
    <title> InstaPost </title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.2/dist/leaflet-search.min.css"/>
    <link rel="stylesheet" href="../css/admin.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--navigation bar-->


<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid" style="padding: 20px;">
        <a class="navbar-brand"><h3 class="display-6">InstaPost</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="newadmin"><h5>Ενημέρωση E-Shop</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="leaderboards"><h5>Πίνακας Κατάταξης</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_statistics"><h5>Στατιστικά</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout"><h5>Αποσύνδεση</h5></a>
                </li>
            </ul>
        </div>
    </div>
    <span class="navbar-text">ADMIN PAGE-Admin use only</span>
</nav>
<main>