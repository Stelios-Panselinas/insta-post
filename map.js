let mymap = L.map('mapid');
let latit, longit;
let myPositionMarker;
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);
mymap.setView([38.245466, 21.735505], 14);
this.showAllShopsWithOffers();
this.showShopsWithoutOffer();

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
        myPositionMarker.bindPopup("Your position");
}

 const markersLayer = L.layerGroup();
 mymap.addLayer(markersLayer);
 markersLayer.addTo(mymap);

function showAllShopsWithOffers(){
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
            createPopup(shop_id, name,lat,log);
        }
    }
    xhttp.open("POST", "selectAllShopsWithOffers.php");
    xhttp.send();
}


function showShopsWithoutOffer(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        shops = JSON.parse(this.responseText);
        let selectedShopsLayer = L.layerGroup();
        mymap.addLayer(selectedShopsLayer);
        selectedShopsLayer.addTo(mymap);
        mymap.removeLayer(markersLayer);
        for (i in shops) {
            let shop_id = shops[i].id;
            let name;
            if(!shops[i].name){
                name = "Unknown"
            }else{
               name = shops[i].name;
            }
            let lat = shops[i].latitude;
            let log = shops[i].longtitude;
            let marker = L.marker(L.latLng([lat, log]), {title: name});
            marker.bindPopup(name);
            marker.addTo(selectedShopsLayer);
        }
    }
    xhttp.open("POST", "selectAllshopsWithoutOffers.php");
    xhttp.send();
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
                createPopup(shop_id, name,lat,log);
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
          <a href="#" onclick="storeShopID(`+shop_id+`)" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          <a  href="offerUpload.html" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>
          <br>`

            all_offers = all_offers +cur_offer;
        }
        all_offers = all_offers + `</div>`;
        showOffers(all_offers,lat, log);
        return all_offers;
    }
    xhttp.open("POST", "getOffers.php?q=" + shop_id);
    xhttp.send();

}

var redIcon = L.icon({
    iconUrl: 'redpin.png',

    iconSize:     [40, 45], // size of the icon
    iconAnchor:   [19, 41], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});
function showOffers(offers, lat, log){
    let selectedShopsLayer = L.layerGroup();
    mymap.addLayer(selectedShopsLayer);
    selectedShopsLayer.addTo(mymap);
    let marker = L.marker(L.latLng([lat, log]), {icon: redIcon});
    marker.bindPopup(offers);
    marker.addTo(selectedShopsLayer);
}

function storeShopID(shop_id){
    localStorage.setItem('shop id', shop_id);
    window.location.href = 'userFeedback.html';
    //window.open('userFeedback.html');
}