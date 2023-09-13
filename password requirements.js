function isPasswordValid() {
    document.getElementById("length").innerTEXT="";
    document.getElementById("capital").innerText="";
    document.getElementById("number").innerText="";
    document.getElementById("symbol").innerText="";
    let password =document.getElementById('password').value;
    let first_name=document.getElementById('first_name'). value;
    let last_name=document.getElementById('last_name').value;
    let email=document.getElementById('email').value;
let validated = true
    
    
    if (password.length < 8) {
         document.getElementById("length").innerTEXT="Ο κωδικός πρέπει να περιέχει τουλάχιστον οχτώ χαρακτήρες";
         validated =false;
    }

    
    if (!/[A-Z]/.test(password)) {
         document.getElementById("capital").innerText="Ο κωδικός πρέπει να περιέχει τουλάχιστον ένα κεφαλαίο γράμμα";
         validated =false;
    }

    
    if (!/\d/.test(password)) {
        document.getElementById("number").innerText="O κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό";
        validated =false;
    }

    
    if (!/[#$*&@]/.test(password)) {
        document.getElementById("symbol").innerText="Το password πρέπει να περιέχει τουλάχιστον ένα σύμβολο (π.χ. #$*&@).";
        validated =false;
    }

    
    return true;

    if(validated){
        const xhttp = new XMLHttpRequest();
    XMLHttpRequest.OPEN("GET", "passworddata.php?password="+password+"&first_name="+first_name+"&last_name="+last_name+"&email="+email );
    XMLHttpRequest.send();
    XMLHttpRequest.onload = function() {
        document.getElementById("passworddata").innerHTML = this.responseText;
    }
    }
    

}


