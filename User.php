<?php
class User extends Database {

    public function updateUsername($username, $user_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE user SET first_name=? WHERE user_id=?");
        $stmt->bind_param("si", $username, $user_id);
        $stmt->execute();
    }
}

if ($_GET['function'] == "updateUsername") {
    $user_id = 1; //$_SESSION
    $username = $_GET['username'];
    $user = new User();
    $user->updateUsername($username, $user_id);
}