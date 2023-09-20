
        <div class="container" style="padding: 10px;">
            <div class="row">
                <div class="col-md-2" style="padding:15px ;">
                    <h3>Επεξεργασία Στοιχείων</h3>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#uname">Αλλαγή Ονόματος Χρήστη</button>
                    <div id="uname" class="collapse">
                        <br>
                        <label for="oldpwd"><h6>Εισαγωγή Νέου Ονόματος:</h6></label>
                        <input type="text" class="form-control" placeholder="Όνομα Χρήστη" id="username">
                        <br>
                        <button type="button" class="btn btn-success" onclick="updateUsername()">Αλλαγή</button>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#pswd">Αλλαγή Κωδικού</button>
                    <div id="pswd" class="collapse">
                        <br>
                        <label for="oldpwd"><h6>Εισαγωγή Τρέχοντος Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="oldpwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <span id="oldPassMess" class="text-danger"></span>
                        <br>
                        <label for="newpwd"><h6>Εισαγωγή Καινούργιου Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="newpwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <span class="text-danger" id="validatePass"></span>
                        <br>
                        <label for="reppwd"><h6>Επανάληψη Κωδικού:</h6></label>
                        <input type="password" class="form-control" id="reppwd" placeholder="Εισαγωγή Κωδικού" name="pswd">
                        <span class="text-danger" id="passwordMessage"></span>
                        <span class="text-success" id="passwordSuccess"></span>
                        <br>
                        <button type="button" class="btn btn-success" onclick="updatePassword()">Αλλαγή</button>
                    </div>
                </div>
                <div class="col-md-4" style="padding:15px ;">
                    <h3>Ιστορικό Αλληλεπιδράσεων</h3>
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="likesDislikesTable"></table>
                    </div>
                </div>

                <div class="col-md-4 history-table">
                    <h3>Ιστορικό Προσφορών</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="historyTable"></table>
                        </div>
                </div>

                <div class="col-md-2" style="padding: 15px;">
                    <p><h3>Σκορ:</h3><h2 class="text-primary" id="score">12</h2></p>
                    <p><h3>Αριθμός Tokens Προηγούμενου Μήνα:</h3><h2 class="text-danger" id="last_tokens">56</h2></p>
                    <p><h3>Αριθμός Συνολικών Tokens:</h3><h2 class="text-warning" id="total_tokens">32</h2></p>
                </div>
            </div>
        </div>
        <script src="../js/user/userJS.js"></script>