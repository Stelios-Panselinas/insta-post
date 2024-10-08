<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> InstaPost </title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.2/dist/leaflet-search.min.css"/>
    <link rel="stylesheet" href="userCSS.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container-fluid bg-primary" style="padding: 70px;">
    <div class="row">
        <h1 class="display-4 text-white">Εγγραφή!</h1>
    </div>
    </div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 w-50">
      
        <p>Συμπληρώστε αυτήν την φόρμα για να φτιάξετε καινούριο λογαριασμό.</p>
        <form action="../classes/Login.php?function=register" method="post">
        <label for="first_name"><b>First Name</b></label>
        <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" required>
        <br><label for="last_name"><b>Last Name</b></label>
        <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" required>
        

        <label for="email"><b>Email</b></label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>

        <label for="password"><b>Κωδικός Πρόσβασης</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required id="password">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label for="password2"><b>Επανάληψη Κωδικόυ Πρόσβασης</b></label>
        <input type="password" class="form-control" placeholder="Repeat Password" name="password2" id="password2" required>
             <?php if (isset($_SESSION['error_message'])) {
                echo '<div style="color: red;">' . $_SESSION['error_message'] . '</div>';
            }
            ?>
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Να με θυμάσαι
        </label>
        <p>Φτιάχνοντας λογαριασμό συμφωνείτε στους <a href="#">Όρους και Προϋποθέσεις</a>.</p>
            <input type="submit" class="btn btn-success" value="Εγγραφή">
    </form>
  </div>
 </div>
</body>
</html>
