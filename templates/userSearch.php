<?php
session_start();
?>

<div class="container-fluid px-0">
    <div class="container-fluid px-0 main-site">
        <div class="row px-0">
            <div class="col-sm-3 d-block d-sm-none">
                <h3 class="text-secondary">Welcome user!</h3>
                <br>
                <!--search filters category-->
                <h4 class="text-primary">Αναζήτηση βάση Κατηγορίας</h4>
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
                    <button class="btn btn-primary" onclick="selectShops()">Αναζήτηση</button>
                </div>

                <br>
            </div>
            <div class="col-12 col-sm-6 px-0">
                <!-- the map left side-->
                <div class="mapid" id="mapid">
                    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.2/leaflet-search.min.js"></script>
                </div>
            </div>

            <!--Right side-->
            <div class="col-sm-3 d-none d-sm-block">
                <h3 class="text-secondary" id="user_id">Welcome user!</h3>
                <br>
                <!--search filters category-->
                <h4 class="text-primary">Αναζήτηση βάση Κατηγορίας</h4>

                <div class="input-group">
                    <label class="input-group-text" for="selectCategory">Κατηγορίες</label>
                    <select class="form-select" id="selectCategory" name="category">
                        <option selected>Επιλογή...</option>
                        <option value="1">Βρεφικά Είδη</option>
                        <option value="2">Για κατοικίδια</option>
                        <option value="3">Καθαριότητα</option>
                        <option value="4">Ποτά-Αναψυκτικά</option>
                    </select>
                    <button class="btn btn-primary" onclick="selectShops()" >Αναζήτηση</button>
                </div>
            </div>
        </div>

    </div>
</div>
