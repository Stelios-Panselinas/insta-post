<!DOCTYPE html>
<html>
    <head>
        <title> Administrator-Instashop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      </head>
    <body onload="leadertable ()">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid" style="padding: 20px;">
          <a class="navbar-brand"><h3 class="display-6">InstaPost</h3></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
          </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                        <li class="nav-item">
                         <a class="nav-link" href="newadmin.php"><h5>Ενημέρωση E-Shop</h5></a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link" href="leaderboards.html"><h5>Πίνακας Κατάταξης</h5></a>
                        </li>
                             <li class="nav-item">
                            <a class="nav-link" href="../admin%20statistics.html"><h5>Στατιστικά</h5></a>
                            </li>
                        <li class="nav-item">
                             <a class="nav-link" href="#"><h5>Αποσύνδεση</h5></a>
                        </li>    
                        </ul>
                    </div>
        </div>
            <span class="navbar-text">ADMIN PAGE-Admin use only</span>
    </nav>
    <div class="container mt-4">
        
        <table class="table" onload="leadertable()">
          <thead class="table-dark">
            <tr>
              <th>Αριθμός Κατάταξης</th>
              <th>Όνομα Χρήστη</th>
              <th>Tokens Προηγούμενου Μήνα</th>
              <th>Συνολικά Tokens</th>
            </tr>
          
          <tbody id="leaderboard">

          </tbody>
        </table>

        
        
        
        
        <div id="pagination">
          <button class="btn btn-primary" id="prevPage">Previous</button>
          <button class="btn btn-primary" id="nextPage">Next</button>
        </div>

        <script src = "../leaderboard.js"></script>
    </div>      

</body>
</html>    