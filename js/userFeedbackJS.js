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
                       <p>Υποβολλή από: `+offers[i].first_name+ ` `+offers[i].last_name+` <br>score: `+offers[i].score+`</p>
                       <button type="button" class="btn btn-success" id="like" onclick="addLike(`+offers[i].id+`,`+offers[i].likes+`)">LIKE</button>
                       <button type="button" class="btn btn-danger" id="dislike" onclick="addDislike(`+offers[i].id+`,`+offers[i].dislikes+`)">DISLIKE</button>
                       <button type="button" onclick="disableButtons(`+i+`)" id="out-of-stock`+i+`" class="btn btn-warning">ΔΕΝ ΥΠΑΡΧΕΙ ΑΠΟΘΕΜΑ</button>
                       <button type="button" class="btn btn-info" id="in-stock`+i+`" onclick="enableButtons(`+i+`)">ΞΑΝΑ ΣΕ ΑΠΟΘΕΜΑ</button>
                    </div>
              </div>
            </div>
            <br>`
        }
        document.getElementById('main-body').innerHTML = all_offers;
    }
    xhttp.open("POST", "../classes/Shop.php?function=getOffersFromCategory&category_id=0&shop_id="+shop_id);
    xhttp.send();

}

function disableButtons(i) {
    document.getElementById("like"+i).disabled = true;
    document.getElementById("dislike"+i).disabled = true;
}

function enableButtons(i){
    if(document.getElementById("like"+i).disabled && document.getElementById("dislike").disabled){
        document.getElementById("like"+i).disabled= false;
        document.getElementById("dislike"+i).disabled = false;
    }

}

function addLike(offer_id,likes){
    likes++;
    eleme_id = 'num_likes'+ offer_id;
    document.getElementById(eleme_id).innerText= 'Likes: '+likes;
        const url = '../classes/Shop.php?function=addLike&likes='+likes+'&offer_id='+offer_id;
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.send();
}

function addDislike(offer_id,dislikes){
    dislikes++;
    eleme_id = 'num_dislikes'+ offer_id;
    document.getElementById(eleme_id).innerText = 'Dislikes: '+dislikes;
    const url = '../classes/Shop.php?function=addDislike&dislikes='+dislikes+'&offer_id='+offer_id;
    fetch(url);
}
