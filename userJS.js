function updateUsername(){
    let newUsername = document.getElementById('username').value;
    const url = 'User.php?function=updateUsername&username='+newUsername;
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
}

function updatePassword(){
        let newPass = document.getElementById('newpwd').value;
        let oldPass = document.getElementById('oldpwd').value;
        let rePass = document.getElementById('reppwd').value;
        document.getElementById("validatePass").innerText = "";
        document.getElementById("passwordMessage").innerText = "";
        document.getElementById("oldPassMess").innerText = "";
        document.getElementById('passwordSuccess').innerText = "";

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if(this.responseText == 'true'){
                document.getElementById('oldPassMess').innerText = 'Password is not correct!';
            }
        }
        xhttp.open("GET", 'User.php?function=validateOldPassword&oldPassword='+oldPass);
        xhttp.send();

        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(newPass)) {
            document.getElementById('validatePass').innerText = 'New password must contain at least one uppercase letter, one number, and one special character, and be at least 8 characters long.';
            //x return;
        }

        if (newPass !== rePass) {
            document.getElementById('passwordMessage').innerText = "Passwords do not match!";
            //setTimeout(hideElement(), 1500);
            return;
        }

        const url = 'User.php?function=updatePassword&newPassword='+newPass;
        xhttp.open("GET", url);
        xhttp.send();

        // Clear the form and display a success message (replace with your logic)
        document.getElementById("validatePass").value = "";
        document.getElementById("passwordMessage").value = "";
        document.getElementById("passwordSuccess").textContent = "Password changed successfully.";
}

function showData(){
    let url = 'User.php?function=showData'
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
    xhttp.onload = function (){
        document.getElementById('likesDislikesTable').innerHTML = this.responseText;
    }
}