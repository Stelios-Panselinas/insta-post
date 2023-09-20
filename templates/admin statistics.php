<!DOCTYPE html>
<html>
    <head>
        <title> Administrator-Instashop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
         .column {
    float: center;
    width: 60%;
    padding: 15px;
  }
  </style>
    <body>
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
                         <a class="nav-link" href="leaderboards.php"><h5>Πίνακας Κατάταξης</h5></a>
                        </li>
                             <li class="nav-item">
                            <a class="nav-link" href="admin statistics.html"><h5>Στατιστικά</h5></a>
                            </li>
                        <li class="nav-item">
                             <a class="nav-link" href="#"><h5>Αποσύνδεση</h5></a>
                        </li>    
                        </ul>
                    </div>
        </div>
            <span class="navbar-text">ADMIN PAGE-Admin use only</span>
         </nav>
    
    
  <br>
  <br>
 
        <div class="column">
            
        <canvas id="myChart"></canvas>
        
           
            
        <input type="month" onchange="filterChart(this)"/>
         </div>
      
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
      
    
            <script src='../statistics.js'></script>
            
            
    </body>
</html>  
  