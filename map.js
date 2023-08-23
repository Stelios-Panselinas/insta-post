let mymap = L.map('mapid');
let latit, longit;
let myPositionMarker;
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);
mymap.setView([38.245466, 21.735505], 14);

// get user position
if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(setPosition);
   } 
  

function setPosition(position){
        var markerP = L.icon({
          iconUrl: 'icon.png',
          iconSize:     [38, 38], 
          iconAnchor:   [1, 1], 
          popupAnchor:  [-3, -76] 
      });
        mymap.setView([position.coords.latitude, position.coords.longitude], 16);
        myPositionMarker = L.marker([position.coords.latitude, position.coords.longitude], {icon: markerP}).addTo(mymap);
        myPositionMarker.bindPopup(
          `<p><b>My Market</b></p>
        <div>
        <div style="background-color: white;
            width: 250px;
            height: 300px;
          
            overflow: scroll;">
          <p>Όνομα Προϊόντος
          <p class="card-text" id="price">Τιμή:4$</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: 23</p>
          <p>Dislikes: 2</p>
          <a href="userFeedback.html" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          <p>Όνομα Προϊόντος
          <p class="card-text" id="price">Τιμή:4$</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: 23</p>
          <p>Dislikes: 2</p>
          <a href="userFeedback.html" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          </div>
          <a  href="offerUpload.html" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>
          </div>
          <?php echo"hello"?>
            `);
}
let  shops;
const markersLayer = L.layerGroup();
mymap.addLayer(markersLayer);
markersLayer.addTo(mymap);
addAllShopsToMap("shops.geojson");

async function addAllShopsToMap(file) {
  let myObject = await fetch(file);
  let myText = await myObject.text();
  shops = JSON.parse(myText);


  var featuresLayer = new L.GeoJSON(shops, {
    onEachFeature: function (feature, marker) {
        marker.bindPopup(`<p><b>My Market</b></p>
        <div>
        <div style="background-color: white;
            width: 250px;
            height: 300px;
          
            overflow: scroll;">
          <p>Όνομα Προϊόντος</p>
          <p class="card-text" id="price">Τιμή:4$</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: 23</p>
          <p>Dislikes: 2</p>
          <a href="userFeedback.html" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          <p>Όνομα Προϊόντος
          <p class="card-text" id="price">Τιμή:4$</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: 23</p>
          <p>Dislikes: 2</p>
          <a href="userFeedback.html" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          </div>
          <a  href="offerUpload.html" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>
          </div>
          <?php echo"hello"?>
            `);
        marker.addTo(markersLayer);
    }
  });
  featuresLayer.addTo(mymap);
    
  let controlSearch = new L.Control.Search({
      position: "topright",
      layer: featuresLayer,
      propertyName: "name",
      initial: false,
      zoom: 20,
      marker: false
  });
  mymap.addControl(controlSearch);
  
}

function selectShops() {
    let category_id = document.getElementById("selectCategory").value;
    let shops;
    category_id = 1;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
            shops = JSON.parse(this.responseText);
            let selectedShopsLayer = L.layerGroup();
            mymap.addLayer(selectedShopsLayer);
            selectedShopsLayer.addTo(mymap);
            mymap.removeLayer(markersLayer);
            for (i in shops) {
                let shop_id = shops[i].id;
                let name = shops[i].name;
                let lat = shops[i].latitude;
                let log = shops[i].longtitude;
                let marker = L.marker(L.latLng([lat, log]), {title: name});
                marker.bindPopup(createPopup(shop_id, name,lat,log));
                marker.addTo(selectedShopsLayer);
                }
            }
    xhttp.open("POST", "selectShopsByCategory.php?q=" + category_id);
    xhttp.send();
}

function createPopup(shop_id, shop_name, lat, log) {
    let cur_offer;
    let all_offers = "";
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let offers = JSON.parse(this.responseText);
        all_offers = `<p><b>` + shop_name + `</b></p>
        <div style="background-color: white;
            width: 250px;
            height: 330px;
            overflow: auto;">`
        for (i in offers) {
            cur_offer = `<p>Όνομα Προϊόντος` + offers[i].name + `</p>
          <p class="card-text" id="price">Τιμή:` + offers[i].price + `</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: ` + offers[i].likes + `</p>
          <p>Dislikes: ` + offers[i].dislikes + `</p>
          <a href="userFeedback.html" onclick="rateOffers(`+shop_id+`)" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          <a  href="offerUpload.html" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>
          <br>`

            all_offers = all_offers +cur_offer;
        }
        all_offers = all_offers + `</div>`
        console.log(all_offers);
        returnOffers(all_offers,lat, log);
        return all_offers;
    }
    xhttp.open("POST", "getOffers.php?q=" + shop_id);
    xhttp.send();

}

function returnOffers(offers, lat, log){
    let selectedShopsLayer = L.layerGroup();
    mymap.addLayer(selectedShopsLayer);
    selectedShopsLayer.addTo(mymap);
    let marker = L.marker(L.latLng([lat, log]), {title: name});
    marker.bindPopup(offers);
    marker.addTo(selectedShopsLayer);
}