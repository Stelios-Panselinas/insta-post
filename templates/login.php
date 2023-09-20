<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container-fluid bg-primary" style="padding: 70px;">
    <div class="row">
        <h1 class="display-4 text-white">Σύνδεση</h1>
    </div>
</div>

<div class="container-md">
    <div class="row justify-content-center">
        <div class="col-12 w-50">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Admin Login</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>User Login</h3>
                    <form action="../classes/Login.php?function=login" method="post">
                        <label for="email"><h6>Email</h6></label>
                        <input type="email" class="form-control" id="email" placeholder="Εισαγωγή Email" name="email">
                        <label for="password"><b>Κωδικός</b></label>
                        <input type="password" class="form-control" id="password" placeholder="Εισαγωγή Κωδικού"
                               name="password">
                        <span class="text-danger" id="loggin-message"></span>
                        <br>
                        <input type="submit" class="btn btn-success" value="Σύνδεση">
                        <br>
                        <a href="register">Eγγραφή </a>
                    </form>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Administrator Login</h3>
                    <form action="../classes/Login.php?function=login_admin" method="post">
                        <label for="email_admin"><h6>Email</h6></label>
                        <input type="email" class="form-control" id="email_admin" placeholder="Εισαγωγή Email" name="email_admin">
                        <label for="password"><b>Κωδικός</b></label>
                        <input type="password" class="form-control" id="password_admin" placeholder="Εισαγωγή Κωδικού"
                               name="password_admin">
                        <span class="text-danger" id="loggin-message"></span>
                        <br>
                        <input type="submit" class="btn btn-success" value="Σύνδεση Admin">
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>