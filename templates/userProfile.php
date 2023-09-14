<html>
    <head>
        <title>Επεξεργασία Προφίλ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container-fluid" style="padding: 20px;">
              <a class="navbar-brand" href="userHome.html"><h3 class="display-6">InstaPost</h3></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="userSearch.html"><h5>Αναζήτηση Προϊόντος</h5></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="leaderboards.html"><h5>Πίνακας Κατάταξης</h5></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="userProfile.html"><h5>Επεξεργασία Προφίλ</h5></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><h5>Αποσύνδεση</h5></a>
                  </li>    
                </ul>
              </div>
            </div>
          </nav>
        

        <div class="container" style="padding: 10px;">
            <div class="row">
                <div class="col-md-2" style="padding:15px ;">
                    <h3>Επεξεργασία Στοιχείων</h3>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#uname">Αλλαγή Ονόματος Χρήστη</button>
                    <div id="uname" class="collapse">
                        <br>
                        <label for="oldpwd"><h6>Εισαγωγή Νέου Ονόματος:</h6></label>
                        <input type="text" class="form-control" placeholder="Όνομα Χρήστη">
                        <br>
                        <button type="button" class="btn btn-success">Αλλαγή</button>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#pswd">Αλλαγή Κωδικού</button>
                    <div id="pswd" class="collapse">
                        <br>
                        <label for="oldpwd"><h6>Εισαγωγή Τρέχοντος Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="oldpwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <br>
                        <label for="newpwd"><h6>Εισαγωγή Καινούργιου Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="newpwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <br>
                        <label for="reppwd"><h6>Επανάληψη Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="reppwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <br>
                        <button type="button" class="btn btn-success">Αλλαγή</button>
                    </div>
                </div>
                <div class="col-md-4" style="padding:15px ;">
                    <h3>Ιστορικό Αλληλεπιδράσεων</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Όνομα Προϊόντος</th>
                              <th>Ημερομηνία Αλληλεπίδρασης</th>
                              <th>Αλληλεπίδραση</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Anna</td>
                              <td>Pitt</td>
                              <td>35</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                </div>

                <div class="col-md-4" style="padding: 15px;">
                    <h3>Ιστορικό Προσφορών</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Όνομα Προϊόντος</th>
                                  <th>Ημερομηνία Προσφοράς</th>
                                  <th>Κατάστημα</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Anna</td>
                                  <td>Pitt</td>
                                  <td>35</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                  </tr>
                              </tbody>
                            </table>    
                        </div>
                </div>

                <div class="col-md-2" style="padding: 15px;">
                    <p><h3>Συνολικο Σκορ:</h3><h2 class="text-primary">23</h2></p>
                    <p><h3>Τρέχον Σκορ:</h3><h2 class="text-success">12</h2></p>
                    <p><h3>Αριθμός Tokens Προηγούμενου Μήνα:</h3><h2 class="text-danger">56</h2></p>
                    <p><h3>Αριθμός Συνολικών Tokens:</h3><h2 class="text-warning">32</h2></p>
                </div>
            </div>
        </div>
    </body>
</html>