<?php
class User extends Database {

    public function updateUsername($username, $user_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE user SET first_name=? WHERE user_id=?");
        $stmt->bind_param("si", $username, $user_id);
        if ($stmt->execute()) {
            // Query executed successfully
            echo "Username updated successfully";
        } else {
            // Query failed
            echo "Error: " . $stmt->error;
        }

    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($_GET['function'] == "updateUsername") {
        $user_id = 1; // Replace with your logic to get the user ID (e.g., from session)
        $username = $data['username'];

        $user = new User();
        $user->updateUsername($username, $user_id);
    }
}