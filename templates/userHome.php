<?php

if (!isset($_SESSION['userData']['logged_in'])) {
    header("Location: login");
}
?>

<html>
    <head>
        <title>Αξιολόγηση Προσφοράς</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        
        <div class="container-fluid bg-primary" style="padding: 70px;">
            <div class="row">
                <h1 class="display-4 text-white">Καλώς Ήρθες!</h1>
            </div>
            <div class="row d-flex">
                <a type="button" href="userSearch" class="btn btn-primary"><h3>Αναζήτηση Προϊόντων</h3></a>
                <br>
                <br>
                <a type="button" href="userProfile" class="btn btn-primary"><h3>Επεξεργασία Προφιλ</h3></a>
                <br>
                <br>
                <a type="button" href="https://e-katanalotis.gov.gr/householdBasket" class="btn btn-primary"><h3>e-Καταναλωτής</h3></a>
                <br>
                <br>
                <br>
                <a type="button" href="logout" class="btn btn-primary"><h4>Αποσύνδεση</h4></a>
            </div>
        </div>
    </body>
</html>