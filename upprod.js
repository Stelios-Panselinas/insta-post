
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
            
         let kname =   document.getElementById ("kname").value;
         let longt =   document.getElementById ("mikos").value;
         let latit =   document.getElementById ("platos").value;
         let tupos =   document.getElementById ("tname").value;
        
            const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
           
        }
        xhttp.open("POST", "upkatast.php?kname=" + kname + "&longt=" + longt + "&latit=" + latit + "&tupos=" + tupos );
        xhttp.send();
    
   

}