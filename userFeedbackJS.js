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
                    <p>Likes:` + offers[i].likes + `</p>
                    <p>Dislikes: ` + offers[i].dislikes + `</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#btn`+i+`">Περισσότερα</button>
                    <div id="btn`+i+`" class="collapse">
                       <p>Υποβολλή από: user123456789 score 20</p>
                       <button type="button" class="btn btn-success">LIKE</button>
                       <button type="button" class="btn btn-danger">DISLIKE</button>
                       <button type="button" class="btn btn-warning">ΔΕΝ ΥΠΑΡΧΕΙ ΑΠΟΘΕΜΑ</button>
                       <button type="button" class="btn btn-info">ΞΑΝΑ ΣΕ ΑΠΟΘΕΜΑ</button>
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
