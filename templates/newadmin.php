    <div class="container-fluid px-0 main-site">
        <div class="row px-0">
           
            <div class="col-12 col-sm-6 px-0">
                <!-- the map left side-->
                <div class="mapid" id="mapid">
                    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.2/leaflet-search.min.js"></script>
                    <script></script>
                </div>
            </div>

            <!--Right side-->
            <div class="col-sm-3 d-none d-sm-block">

                <!--search filters category-->
                
                <br>
                <br>
                <h3 class="text-primary">Αναζήτηση βάση Κατηγορίας</h3>
                <br>
                <div class="input-group">
                    <label class="input-group-text" for="selectCategory">Κατηγορίες</label>
                    <select class="form-select" id="selectCategory" name="category">
                        <option selected>Επιλογή...</option>
                        <option value="1">Αντισυπτικά</option>
                        <option value="2">Βρεφικά Είδη</option>
                        <option value="3">Για κατοικίδια</option>
                        <option value="4">Καθαριότητα</option>
                        <option value="5">Ποτά-Αναψυκτικά</option>
                    </select>
                    <script src = "map.js"></script>
                    <button class="btn btn-primary" onclick="selectShops()" >Αναζήτηση</button>
                </div>
                <br>
                <br>
                <h3 class="text-primary">Ενημέρωση Προϊόντος</h3>
                <br>
                <label for="pname">Όνομα Προϊόντος:</label><br>
                <input type="text" id="pname" name="pname">
                <br>
                <br>
                <label for="subCategory">Υποκατηγορια:</label>
                <div class="input-group">
                    
                    <select class="form-select" id="subCategory" name="subCategory">
                        <option selected>Επιλογή...</option>
                        <option value="1">Βρεφικές τροφές</option>
                        <option value="2">Γάλα</option>
                        <option value="3">Pet shop/Τροφή γάτας</option>
                        <option value="4">Pet shop/Τροφή σκύλου</option>
                        <option value="5">Απορρυπαντικά</option>
                        <option value="6">Αποσμητικά</option>
                        <option value="7">Κρασιά</option>
                        <option value="8">Μπύρες</option>
                    </select>
                </div>  
                <br>
                <label for="price">Αρχική Τιμή:</label><br>
                <input type="text" id="price" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <br>
                <br>
                <script src = "../upprod.js"></script>
                <button class="btn btn-primary" onclick="productupdate()" >Ενημέρωση</button>
                <br>
                <br>
                 
                    <h3 class="text-primary">Ενημέρωση Καταστήματος</h3>
                    <br>
                    <label for="kname">Όνομα Καταστήματος:</label><br>
                    <input type="text" id="kname" name="kname">
                    <br>
                    <br>
                    <label for="mikos">Μηκος:</label><br>
                    <input type="text" id="mikos" name="mikos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <br>
                    <br>
                    <label for="platos">Πλάτος:</label><br>
                    <input type="text" id="platos" name="platos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <br>
                    <br>
                    <label for="tname">Τύπος Καταστήματος:</label><br>
                    <input type="text" id="tname" name="tname">
                    <br>
                    <br>
                    <button class="btn btn-primary" onclick="updatekataDatabase()" >Ενημέρωση</button>
                    <script src = "../upprod.js"></script>
                    
            </div>

            
            
        </div>

    </div>
</div>
</body>
</html>