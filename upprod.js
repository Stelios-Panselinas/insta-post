
function updateDatabase() {
    let subcategory_id = document.getElementById("subCategory").value;
    let product_id= document.getElementById("pname").value;
    let price_id= document.getElementById("price").value;

    fetch('upprod.php', {
        method: 'POST',
        body: JSON.stringify({ data: subcategory_id,product_id,price_id }),
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

