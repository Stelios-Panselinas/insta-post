function updateUsername(){
    let newUsername = document.getElementById('username').value;
    const url = 'User.php?function=updateUsername&username='+newUsername;
    fetch(url);
}