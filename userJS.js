function updateUsername() {
    // Get the new username from the input field
    let newUsername = document.getElementById('username').value;

    // Create an object to specify the fetch request options
    const requestOptions = {
        method: 'POST',  // Use POST method to send data to the server
        body: JSON.stringify({ username: newUsername }), // Convert data to JSON format
        headers: {
            'Content-Type': 'application/json' // Set the content type to JSON
        }
    };

    // Define the URL for your PHP script
    const url = 'User.php?function=updateUsername';

    // Send the fetch request with the specified options
    fetch(url, requestOptions)
        .then(response => {
            console.log(response);
            // Check if the response status is OK (HTTP 200)
            if (response.ok) {
                // Handle a successful response here if needed
                console.log('Username updated successfully');
            } else {
                // Handle errors or non-OK responses here
                console.error('Failed to update username');
            }
        })
        .catch(error => {
            // Handle any network or fetch-related errors here
            console.error('Error:', error);
        });
}