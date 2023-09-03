<?php
require_once 'Database.php';
class User extends Database {

    public function updateUsername($username, $user_id){
        $this->connect();

        $stmt = $this->prepare("UPDATE user SET first_name=? WHERE user_id=?");
        $stmt->bind_param("si", $username, $user_id);
        $stmt->execute();
    }

    public function updatePassword($user_id, $newPass){
        $this->connect();

        $stmt = $this->prepare('UPDATE user SET password = ? WHERE user_id = ?');
        $stmt->bind_param('si', $newPass, $user_id);
        $stmt->execute();
    }

    public function validateOldPassword($oldPassword, $user_id){
        $this->connect();

        $stmt = $this->prepare('SELECT password FROM user WHERE user_id=?');
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $pass = $row['password'];
        if (strcmp($pass,$oldPassword) == 0){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}

$user = new User();
if ($_GET['function'] == "updateUsername") {
    $user_id = 1; //$_SESSION
    $username = $_GET['username'];
    $user->updateUsername($username, $user_id);
}elseif ($_GET['function'] == 'updatePassword'){
    $user_id = 1;
    $password = $_GET['newPass'];
    $user->updatePassword($user_id, $password);
}elseif ($_GET['function'] == 'validateOldPassword'){
    $user_id = 1;
    $oldPassword = $_GET['oldPassword'];
    $user->validateOldPassword($oldPassword,$user_id);
}