function isEmailValid() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "emaildata.php?" );
    xhttp.send();
    xhttp.onload = function() {
        document.getElementById("emaildata".innerHTML =this.responseText);
    }
}