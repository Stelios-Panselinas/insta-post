
function updateDatabase() {
    
    let product_id= document.getElementById("pname").value;
    let subcategory_id = document.getElementById("subCategory").value;
    let price_id= document.getElementById("price").value;

    fetch('upprod.php', {
        method: 'POST',
        body: JSON.stringify({ data: product_id,subcategory_id,price_id }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updatekataDatabase () {

    let katast_id = document.getElementById("kname").value;
    let longt_id = document.getElementById("mikos").value;
    let latit_id = document.getElementById("platos").value;
    let tupos_id = document.getElementById("tname").value;
    
    fetch('upprod.php', {
        method: 'POST',
        body: JSON.stringify({ data: katast_id,longt_id,latit_id,tupos_id }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
    })
    .catch(error => {
        console.error('Error:', error);
    });


}