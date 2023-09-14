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
        <form action="emaildata.php" method="get">
        <label for="uname"><h6>Email</h6></label>
        <input type="email" class="form-control" id="email" placeholder="Εισαγωγή Email" name="email">

        <label for="password"><b>Κωδικός</b></label>
        <input type="password" class="form-control" id="password" placeholder="Εισαγωγή Κωδικού" name="password">
          <span class="text-danger" id="loggin-message"></span>
        <br>
        <input type="submit" class="btn btn-success"  value="Σύνδεση">
        <div>
          <a href="register.php" >Eγγραφή </a>

          <script src="email.js"></script>
          
        </div>
         
      </form>
      </div>
    </div>
  </div>
  
</form>

</body>
</html>