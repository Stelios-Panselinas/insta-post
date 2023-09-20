const mymap = this.loadMap();
const shopsWithOffersLayer = L.layerGroup();
const shopsWithoutOffersLayer = L.layerGroup();
const selectedShopsLayer = L.layerGroup();
showShopsWithoutOffer(38.246264, 21.735001);
showAllShopsWithOffers(38.246264, 21.735001);



mymap.setView([38.246264, 21.735001], 16);

const redIcon = L.icon({
    iconUrl: '../img/redpin.png',

    iconSize:     [40, 45],
    iconAnchor:   [19, 41],
    popupAnchor:  [0, -40]
});

const markerP = L.icon({
    iconUrl: '../img/icon.png',
    iconSize:     [38, 38],
    iconAnchor:   [0, 0],
    popupAnchor:  [16, 0]
});
myPositionMarker = L.marker([38.246264, 21.735001], {icon: markerP}).addTo(mymap);
myPositionMarker.bindPopup("Your position");
// get user position
// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(setPosition);
// }else{
//     showShopsWithoutOffer(38.246264, 21.735001);
//     showAllShopsWithOffers(38.246264, 21.735001);
//     myPositionMarker = L.marker([38.246264, 21.735001], {icon: markerP}).addTo(mymap);
//     myPositionMarker.bindPopup("Your position");
// }

function loadMap(){
    let mymap = L.map('map_admin');
    let latit, longit;
    let myPositionMarker;
    let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
    let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
    let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
    mymap.addLayer(osm);

    return mymap;
}

function setPosition(position){
    mymap.setView([position.coords.latitude, position.coords.longitude], 16);
    let userPos = L.latLng(position.coords.latitude, position.coords.longitude);
    myPositionMarker = L.marker([position.coords.latitude, position.coords.longitude], {icon: markerP}).addTo(mymap);
    myPositionMarker.bindPopup("Your position");
    showShopsWithoutOffer(position.coords.latitude,position.coords.longitude);
    showAllShopsWithOffers(position.coords.latitude,position.coords.longitude);
}

function showAllShopsWithOffers(userlat,userlon){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        shops = JSON.parse(this.responseText);
        for (i in shops) {
            let shop_id = shops[i].id;
            let name = shops[i].name;
            let lat = shops[i].latitude;
            let log = shops[i].longitude;
            if(dinstance(userlat,userlon, shops[i].latitude, shops[i].longitude)<= 0.500){
                createPopup(shop_id, name,lat,log,0, 1, 0);
            }else{
                createPopup(shop_id, name,lat,log,0, 0, 0);
            }
        }
    }
    xhttp.open("GET", "../classes/Shop.php?function=getAllShopsWithOffers");
    xhttp.send();
}

function showShopsWithoutOffer(userlat,userlon){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        shops = JSON.parse(this.responseText);
        mymap.addLayer(shopsWithoutOffersLayer);
        shopsWithoutOffersLayer.addTo(mymap);
        mymap.removeLayer(selectedShopsLayer);
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
            let markerPosition = L.latLng([lat, log]);
            if(dinstance(userlat,userlon, shops[i].latitude, shops[i].longtitude)<= 0.500){
                let marker = L.marker(L.latLng([lat, log]), {title: name});
                marker.bindPopup('<strong>'+name+'</strong><br><br><a  href="offerUpload.html" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>');
                marker.addTo(shopsWithoutOffersLayer);
            }else{
                let marker = L.marker(L.latLng([lat, log]), {title: name});
                marker.bindPopup(name);
                marker.addTo(shopsWithoutOffersLayer);
            }

        }
    }
    xhttp.open("POST", "../classes/Shop.php?function=getAllShopsWithoutOffers");
    xhttp.send();
}

function selectShops() {
    selectedShopsLayer.clearLayers();
        let userLat = 38.246264;
        let userLon = 21.735001;

        let category_id = parseInt(document.getElementById("selectCategory").value);
        let shops;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            shops = JSON.parse(this.responseText);
            for (i in shops) {
                let shop_id = shops[i].id;
                let name = shops[i].name;
                let lat = shops[i].latitude;
                let log = shops[i].longitude;
                if (dinstance(userLat, userLon, shops[i].latitude, shops[i].longitude) <= 0.500) {
                    createPopup(shop_id, name, lat, log, 1, 1, category_id);
                } else {
                    createPopup(shop_id, name, lat, log, 1, 0, category_id);
                }
            }
        }
        xhttp.open("POST", "../classes/Shop.php?function=getAllShopsWithOffersCategory&category_id=" + category_id);
        xhttp.send();

}

function createPopup(shop_id, shop_name, lat, log, isSelected, inRange, category_id) {
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
        if(inRange){
            for (i in offers) {
                cur_offer = `<p>Όνομα Προϊόντος` + offers[i].name + `</p>
          <p class="card-text" id="price">Τιμή:` + offers[i].price + `</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
          <p>Απόθεμα: ΝΑΙ</p>
          <p>Likes: ` + offers[i].likes + `</p>
          <p>Dislikes: ` + offers[i].dislikes + `</p>
          <a href="#" onclick="storeShopID(`+shop_id+`)" class="btn btn-outline-success"><h6>Αξιολόγηση Προσφοράς</h6></a>
          <br>
          <a  href="offerUpload" onclick="storeShopID(`+shop_id+`)" class="btn btn-outline-success "><h6>Υποβολή Προσφοράς</h6></a>
          <br>`;
                all_offers = all_offers +cur_offer;
            }
        }else {
            for (i in offers) {
                cur_offer = `<p>Όνομα Προϊόντος` + offers[i].name + `</p>
          <p class="card-text" id="price">Τιμή:` + offers[i].price + `</p>
          <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
              <p>Απόθεμα: ΝΑΙ</p>
              <p>Likes: ` + offers[i].likes + `</p>
              <p>Dislikes: ` + offers[i].dislikes + `</p>
              <br>`;
                all_offers = all_offers + cur_offer;
            }
        }

        showOffers(all_offers,parseFloat(lat), parseFloat(log), isSelected);
        return all_offers;
    }
        xhttp.open("POST", "../classes/Shop.php?function=getOffersFromCategory&category_id=" + category_id+"&shop_id="+shop_id);
        xhttp.send();
}

function showOffers(offers, lat, log, isSelected){
    let mymarker = L.marker([lat, log], {icon: redIcon});
    if(isSelected){
        mymap.addLayer(selectedShopsLayer);
        selectedShopsLayer.addTo(mymap);
        mymarker.bindPopup(offers);
        mymarker.addTo(selectedShopsLayer);
        mymap.removeLayer(shopsWithOffersLayer);
        mymap.removeLayer(shopsWithoutOffersLayer);
    }else{
        mymap.addLayer(shopsWithOffersLayer);
        shopsWithOffersLayer.addTo(mymap);
        mymarker.bindPopup(offers);
        mymarker.addTo(shopsWithOffersLayer);
    }
}

function storeShopID(shop_id){
    localStorage.setItem('shop id', shop_id);
    window.location.href = 'userFeedback';
    //window.open('userFeedback.html');
}

function  dinstance(lat1, lon1, lat2, lon2) {
    lon1 = lon1 * Math.PI / 180;
    lat1 = lat1 * Math.PI / 180;
    lon2 = lon2 * Math.PI / 180;
    lat2 = lat2 * Math.PI / 180;

    let dlon = lon2 - lon1;
    let dlat = lat2 - lat1;
    let a = Math.pow(Math.sin(dlat / 2), 2)
        + Math.cos(lat1) * Math.cos(lat2)
        * Math.pow(Math.sin(dlon / 2), 2);

    let c = 2 * Math.asin(Math.sqrt(a));

    let r = 6371;

    return (c * r);
}