function rateOffers(offers) {
    let all_offers;
    for (i in offers) {
        all_offers = `<div class="card shadow p-4 mb-4">
                <div class="card-body">
                    <h4 class="card-title">` + offers[i].name + `</h4>
                    <p class="card-text" id="price">Τιμή:`+ offers[i].price +`</p>
                    <p>Ημερομηνία Καταχώρησης: 12/11/22</p>
                    <p>Απόθεμα: ΝΑΙ</p>
                    <p>Likes:`+ offers[i].likes +`</p>
                    <p>Dislikes: ` + offers[i].dislikes +`</p>
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#btn1">Περισσότερα</button>
                    <div id="btn1" class="collapse">
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
    document.getElementById('main-body').innerHTML =
}