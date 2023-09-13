function isEmailValid() {
    let password =document.getElementById('password').value;
    let email=document.getElementById('email').value;
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "emaildata.php?email="+email+"&password="+password);
    xhttp.send();
    xhttp.onload = function() {
        document.getElementById("emaildata".innerHTML =this.responseText);
    }
}