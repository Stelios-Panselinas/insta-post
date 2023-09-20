window.onload = function showInteractions(){
    let url = '../classes/User.php?function=showInteractions'
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
    xhttp.onload = function (){
        document.getElementById('likesDislikesTable').innerHTML = this.responseText;;
    }
    showHistory();
}
function updateUsername(){
    let newUsername = document.getElementById('username').value;
    const url = '../../classes/User.php?function=updateUsername&username='+newUsername;
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
        xhttp.open("GET", '../../classes/User.php?function=validateOldPassword&oldPassword='+oldPass);
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

        const url = '../../classes/User.php?function=updatePassword&newPassword='+newPass;
        xhttp.open("GET", url);
        xhttp.send();

        // Clear the form and display a success message (replace with your logic)
        document.getElementById("validatePass").value = "";
        document.getElementById("passwordMessage").value = "";
        document.getElementById("passwordSuccess").textContent = "Password changed successfully.";
}



function showHistory(){
    let url = '../../classes/User.php?function=showHistory'
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
    xhttp.onload = function (){
        document.getElementById('historyTable').innerHTML = this.responseText;
    }
    showRates();
}

function showRates(){
    let url = '../../classes/User.php?function=showRates'
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
    xhttp.onload = function (){
        let rate = JSON.parse(this.responseText);
        document.getElementById('score').innerHTML = rate.score;
        document.getElementById('last_tokens').innerHTML = rate.cur_tokens;
        document.getElementById('total_tokens').innerHTML = rate.total_tokens;
    }
}