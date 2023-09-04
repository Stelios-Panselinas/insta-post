window.onload = function rateOffers() {
    var shop_id = localStorage.getItem('shop id');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let offers = JSON.parse(this.responseText);
        let all_offers;
        for (i in offers) {
            all_offers = all_offers+`<div class="card shadow p-4 mb-4">
                <div class="card-body">
                    <h4 class="card-title">` + offers[i].name + `</h4>
                    <p class="card-text" id="price">Τιμή:` + offers[i].price + `</p>
                    <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
                    <p>Απόθεμα: ΝΑΙ</p>
                    <p id="num_likes">Likes:` + offers[i].likes + `</p>
                    <p id="num_dislikes">Dislikes: ` + offers[i].dislikes + `</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#btn`+i+`">Περισσότερα</button>
                    <div id="btn`+i+`" class="collapse">
                       <p>Υποβολλή από: user123456789 score 20</p>
                       <button type="button" class="btn btn-success" id="like" onclick="addLike(`+offers[i].id+`,`+offers[i].likes+`)">LIKE</button>
                       <button type="button" class="btn btn-danger" id="dislike" onclick="addDislike(`+offers[i].id+`,`+offers[i].dislikes+`)">DISLIKE</button>
                       <button type="button" onclick="disableButtons()" id="out-of-stock" class="btn btn-warning">ΔΕΝ ΥΠΑΡΧΕΙ ΑΠΟΘΕΜΑ</button>
                       <button type="button" class="btn btn-info" id="in-stock" onclick="enableButtons()">ΞΑΝΑ ΣΕ ΑΠΟΘΕΜΑ</button>
                    </div>
              </div>
            </div>
            <br>`
        }
        document.getElementById('main-body').innerHTML = all_offers;
    }
    xhttp.open("POST", "getOffers.php?q=" + shop_id);
    xhttp.send();

}

function disableButtons() {
    document.getElementById("like").disabled = true;
    document.getElementById("dislike").disabled = true;
}

function enableButtons(){
    if(document.getElementById("like").disabled && document.getElementById("dislike").disabled){
        document.getElementById("like").disabled= false;
        document.getElementById("dislike").disabled = false;
    }

}

function addLike(offer_id,likes){
    likes++;
    document.getElementById('num_likes').innerText= 'Likes: '+likes;
        const url = 'Shop.php?function=addLike&likes='+likes+'&offer_id='+offer_id;
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.send();
}

function addDislike(offer_id,dislikes){
    dislikes++;
    document.getElementById('num_dislikes').innerText = 'Dislikes: '+dislikes;
    const url = 'Shop.php?function=addDislike&dislikes='+dislikes+'&offer_id='+offer_id;
    fetch(url);
}
