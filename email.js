function isEmailValid() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "emaildata.php?email="+email+"&password="+password);
    xhttp.send();
    xhttp.onload = function() {
        document.getElementById("emaildata".innerHTML =this.responseText);
    }
}