

        <div class="container mt-3" style="padding: 70px;">
            <div class="row">
                <div class="col-md-4" style="padding: 10px;">

                    <h4>Αναζήτηση Προϊόντος</h4>
                    <form>
                    
                        <input type="text" id="searchBar" class="form-control rounded" placeholder="Search" onkeyup="showResult(this.value)" />
                    
                      <script src = "../js/offer.js"></script>
                      <select multiple class="form-select search-results" id="results" onclick="autoFill(this.value)">
                      </select>
                    </form>
                </div>
                <div class="col-md-8" style="padding: 10px;">
                    <h4>Συμπλήρωση Στοιχείων Προϊόντος</h4>
                    <br>

                        <h5>Επιλογή Κατηγορίας:</h5>
                        <select class="form-select mt-3" id="category" onchange="sub()">
                            <option value="0">Επιλέξτε Κατηγορία</option>
                            <option value="1">Βρεφικά Είδη</option>
                            <option value="2">Για κατοικίδια</option>
                            <option value="3">Καθαριότητα</option>
                            <option value="4">Ποτά-Αναψυκτικά</option>
                        </select>
                        <br>
                        <h5>Επιλογή Υποκατηγορίας:</h5>
                        <select class="form-select mt-3" id="subcategory" onchange="prod()">
                            <option value="0">Επιλέξτε Υποκατηγορία</option>
                        </select>
                        <br>
                        <h5>Επιλογή Προϊόντος:</h5>
                        <select class="form-select mt-3" id="products">
                            <option value="0">Επιλέξτε Προϊόν</option>
                        </select>
                        <br>
                        <h5>Προσθήκη Τιμής:</h5>
                        <input type="text" class="form-control" placeholder="Τιμή..." id="price">
                        <p id="text"></p>
                        <button class="btn btn-success" onclick="submit()">Υποβολή Προσφοράς</button>

                </div>
                
            </div>
            <div class="row" style="width:50% ;">
                <br>

            </div>         
        </div>
    <script src="../js/offer.js"></script>