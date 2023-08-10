let mymap = L.map('mapid');
let latit, longit;
let myPositionMarker;
let osmUrl='https://tile.openstreetmap.org/{z}/{x}/{y}.png';
let osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
mymap.addLayer(osm);

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
addAllShopsToMap("shops.geojson");

async function addAllShopsToMap(file) {
  let myObject = await fetch(file);
  let myText = await myObject.text();
  shops = JSON.parse(myText);

  const markersLayer = L.layerGroup();
  mymap.addLayer(markersLayer);
  markersLayer.addTo(mymap);

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

function selectShops(){
    let category_id = document.getElementById("selectCategory").value;
    let shops;
	console.log(category_id);
    category_id = 1;
	const xhttp = new XMLHttpRequest();
  /*var redIcon = L.icon({
    iconUrl: 'redpin.png',

    iconSize:     [38, 38], // size of the icon
    iconAnchor:   [1, 1], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});*/

	xhttp.onload = function(){
    document.getElementById("demo").innerHTML = this.responseText;
	  shops = JSON.parse(this.responseText);
        console.log(shops);
        console.log(shops[0].latitude);
    //mymap.removeLayer(markersLayer);
	  const shopsLayer = L.layerGroup();
    let shopPositionMarker;
    mymap.addLayer(shopsLayer);
    shopsLayer.addTo(mymap);
    //selectedShops.addTo(mymap);
    var shopLayer = new L.GeoJSON(shops, {
      onEachFeature: function (feature, marker) {
          marker.bindPopup("<p>" + feature.name + "<p>");
          marker.addTo(shopsLayer);
      }
    });
    shopLayer.addTo(mymap);
    
	}
	xhttp.open("POST", "selectShopsByCategory.php?q="+category_id);
	xhttp.send();

}
  
  function addToMapLawer(shop){
    shopPositionMarker = L.marker([shop.latitude, shop.longitude], {icon: greenIcon}).addTo(shopsLayer);
    marker.bindPopup("<p>" + shop.name + "</p>");
        marker.addTo(shopsLayer);
  }

