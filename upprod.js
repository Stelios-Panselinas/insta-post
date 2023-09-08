
function updateDatabase() {
    
    let pname = document.getElementById("pname").value;
    let subCategory = document.getElementById("subCategory").value;
    let price = document.getElementById("price").value;

    const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {

            xhttp.open("POST", "upprod.php?pname=" + pname + "&subCategory=" + subCategory + "&price=" + price );
        xhttp.send();
         }
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