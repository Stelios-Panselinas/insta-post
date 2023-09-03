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

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            console.log(this.responseText == 'true');
            if(this.responseText == 'true'){
                setText();
            }
        }
        xhttp.open("GET", 'User.php?function=validateOldPassword&oldPassword='+oldPass);
        xhttp.send();

        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(newPass)) {
            alert("New password must contain at least one uppercase letter, one number, and one special character, and be at least 8 characters long.");
            return;
        }

        if (newPass !== rePass) {
            document.getElementById('passwordMessage').innerText = "New password do not match with the new password!";
            setTimeout(hideElement(), 1500);
            return;
        }

        // Send the current and new passwords to the server via AJAX (not shown here)

        // Clear the form and display a success message (replace with your logic)
        document.getElementById("currentPassword").value = "";
        document.getElementById("newPassword").value = "";
        document.getElementById("confirmPassword").value = "";
        document.getElementById("passwordMessage").textContent = "Password changed successfully.";

}

function hideElement() {
        document.getElementById('oldPassMess').innerText = "";
}

function setText(){
    document.getElementById('oldPassMess').innerText = 'Password is not correct!';
    setTimeout(hideElement(),1500);
}