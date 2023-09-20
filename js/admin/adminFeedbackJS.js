window.onload = function rateOffers() {
    var shop_id = localStorage.getItem('shop id');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let offers = JSON.parse(this.responseText);
        let all_offers = '';
        for (i in offers) {
            all_offers = all_offers+`<div class="card shadow p-4 mb-4">
                <div class="card-body">
                    <h4 class="card-title">` + offers[i].name + `</h4>
                    <p class="card-text" id="price">Τιμή:` + offers[i].price + `</p>
                    <p>Ημερομηνία Καταχώρησης: `+offers[i].entry_daytime+`</p>
                    <p>Απόθεμα: ΝΑΙ</p>
                    <p id="num_likes`+offers[i].id+`">Likes:` + offers[i].likes + `</p>
                    <p id="num_dislikes`+offers[i].id+`">Dislikes: ` + offers[i].dislikes + `</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#btn`+i+`">Περισσότερα</button>
                    <div id="btn`+i+`" class="collapse">
                       <p>Υποβολλή από: `+offers[i].first_name+ ` `+offers[i].last_name+` <br>score: `+offers[i].score+`</p>`;
            if(offers[i].valid === 1){
                all_offers = all_offers+`<button type="button" class="btn btn-success" id="like`+offers[i].id+`" onclick="addLike(`+offers[i].id+`,`+offers[i].likes+`)">LIKE</button>
                       <button type="button" class="btn btn-danger" id="dislike`+offers[i].id+`" onclick="addDislike(`+offers[i].id+`,`+offers[i].dislikes+`)">DISLIKE</button>
                       <button type="button" onclick="disableButtons(`+offers[i].id+`)" id="out-of-stock`+offers[i].id+`" class="btn btn-warning">ΔΕΝ ΥΠΑΡΧΕΙ ΑΠΟΘΕΜΑ</button>
                       <button type="button" class="btn btn-info" id="in-stock`+i+`" onclick="enableButtons(`+offers[i].id+`)">ΞΑΝΑ ΣΕ ΑΠΟΘΕΜΑ</button></div>
                       <button type="button" class="btn btn-danger" id="dislike`+offers[i].id+`" onclick="deleteOffer(`+offers[i].id+`)">DELETE</button>
              </div>
            </div>
            <br>`
            }else {
                all_offers = all_offers+`<button type="button" class="btn btn-success" id="like`+offers[i].id+`" onclick="addLike(`+offers[i].id+`,`+offers[i].likes+`)" disabled>LIKE</button>
                       <button type="button" class="btn btn-danger" id="dislike`+offers[i].id+`" onclick="addDislike(`+offers[i].id+`,`+offers[i].dislikes+`)" disabled>DISLIKE</button>
                       <button type="button" onclick="disableButtons(`+offers[i].id+`)" id="out-of-stock`+offers[i].id+`" class="btn btn-warning" disabled>ΔΕΝ ΥΠΑΡΧΕΙ ΑΠΟΘΕΜΑ</button>
                       <button type="button" class="btn btn-info" id="in-stock`+i+`" onclick="enableButtons(`+offers[i].id+`)">ΞΑΝΑ ΣΕ ΑΠΟΘΕΜΑ</button></div>
                       <button type="button" class="btn btn-danger" id="dislike`+offers[i].id+`" onclick="deleteOffer(`+offers[i].id+`)">DELETE</button>
              </div>
            </div>
            <br>`
            }
        }
        document.getElementById('main-body').innerHTML = all_offers;
    }
    xhttp.open("POST", "../../classes/Shop.php?function=getOffersFromCategory&category_id=0&shop_id="+shop_id);
    xhttp.send();

}

function disableButtons(offer_id) {
    document.getElementById("like"+offer_id).disabled = true;
    document.getElementById("dislike"+offer_id).disabled = true;
    document.getElementById('out-of-stock'+offer_id).disabled = true;
    const url = '../../classes/Shop.php?function=disableOffer&offer_id='+offer_id;
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
}

function enableButtons(offer_id){
    if(document.getElementById("like"+offer_id).disabled && document.getElementById("dislike"+offer_id).disabled){
        document.getElementById("like"+offer_id).disabled= false;
        document.getElementById("dislike"+offer_id).disabled = false;
        document.getElementById('out-of-stock'+offer_id).disabled = false;
        const url = '../../classes/Shop.php?function=enableOffer&offer_id='+offer_id;
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.send();
    }

}

function addLike(offer_id,likes){
    likes++;
    eleme_id = 'num_likes'+ offer_id;
    document.getElementById(eleme_id).innerText= 'Likes: '+likes;
        const url = '../../classes/Shop.php?function=addLike&likes='+likes+'&offer_id='+offer_id;
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.send();
}

function addDislike(offer_id,dislikes){
    dislikes++;
    eleme_id = 'num_dislikes'+ offer_id;
    document.getElementById(eleme_id).innerText = 'Dislikes: '+dislikes;
    const url = '../../classes/Shop.php?function=addDislike&dislikes='+dislikes+'&offer_id='+offer_id;
    fetch(url);
}

function deleteOffer(offer_id){
    const url = '../../classes/Admin.php?function=deleteOffer&offer_id='+offer_id;
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
}
