
function leadertable() {

    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", "leaderboard.php?" );
    xhttp.send();
    xhttp.onload = function (){
    document.getElementById('leaderboard').innerHTML = this.responseText;
    } 

       
xhttp.open("GET", "leaderboard.php?" );
xhttp.send(); 
} 