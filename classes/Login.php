<?php
require_once 'Database.php';
//session_start();
if (isset($_SESSION['error_message'])){
    $_SESSION['error_message'] = '';
}
class Login extends Database{
    public function register($first_name, $last_name, $email, $password, $password2){
        $this->connect();


        if (empty($first_name)) {
            $errors[] = "First name is required.";
        }
        if (empty($last_name)) {
            $errors[] = "Last name is required.";
        }
        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        } elseif (!preg_match("/[0-9]/", $password)) {
            $errors[] = "Password must contain at least one number.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password must contain at least one capital letter.";
        } elseif (!preg_match("/[!#$*&@]/", $password)) {
            $errors[] = "Password must contain at least one special character.";
        }elseif ($password !== $password2){
            $errors[] = 'Passwords must be the same.';
        }

        if (isset($errors)) {
            // Pass error messages as URL parameters
            $error_messages = implode("<br>", $errors);
            $_SESSION['error_message'] = $error_messages;
            header("Location: register");
            exit();
        } else {
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            $sql = ("INSERT into user (first_name, last_name, password, email) Values (?, ?, ?, ?);");
            $stmt = $this->prepare($sql);
            $stmt->bind_param('ssss', $first_name, $last_name, $hashed_password, $email);
            $stmt->execute();

            $sql = ("SELECT user_id FROM user WHERE email LIKE ?");
            $stmt = $this->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user_id = $result->fetch_assoc();

            $userData = array(
                'email' => $email,
                'user_id' => $user_id['user_id'],
                'logged_in' => true);
            session_start();
            $_SESSION['userData'] = $userData;
            header('Location: ../userHome');
        }
    }

    public function signIn($email, $entered_password){
        $this->connect();

        $sql = "SELECT password, user_id, first_name, last_name FROM user WHERE email=? ";
        $stmt = $this->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        $stored_hashed_password = $userData['password'];
        $salt = substr($stored_hashed_password, 0, 32);


        $entered_password_hashed = password_hash($entered_password . $salt, PASSWORD_BCRYPT);

        if (!empty($userData) && password_verify($entered_password, $stored_hashed_password)) {
            $userData = array(
                'email'=>$email,
                'user_id'=>$userData['user_id'],
                'first_name'=>$userData['first_name'],
                'last_name'=>$userData['last_name'],
                'logged_in'=>true);
            session_start();
            $_SESSION['userData'] = $userData;
            header("Location: ../userHome");
        } else {
            echo 'Invalid email or password!';
        }
    }
}


$login = new Login();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_GET['function'] === 'register'){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST['password2'];
        $login->register($first_name, $last_name, $email, $password, $password2);
    }elseif ($_GET['function'] === 'login'){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $login->signIn($email, $password);
    }
}