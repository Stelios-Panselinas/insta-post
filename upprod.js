
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
   
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById ("kname").value;
            document.getElementById ("mikos").value;
            document.getElementById ("platos").value;
            document.getElementById ("tname").value;
        }
        xhttp.open("POST", "upkatast.php?kname=" + kname + "longt=" + mikos + "latit=" + platos + "tname" + tupos );
        xhttp.send();
    
   

}