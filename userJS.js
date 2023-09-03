function updateUsername(){
    let newUsername = document.getElementById('username').value;
    const url = 'User.php?function=updateUsername&username='+newUsername;
    fetch(url);
}

function updatePassword(){
    let newPass = document.getElementById('newpwd');
    const url = 'User.php?function=updatePassword$newPass='+newPass;
    fetch(url);
}