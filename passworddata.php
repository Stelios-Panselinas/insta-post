<?php
    $servername = "localhost";
    $username = "root";
    $password= "";
    $dname = "eshop";
    
    $conn = new mysqli($servername, $username, $password, $dname);
    if ($conn->connect_error) {
        die("Connection Failed: ") . $connect_error);
    }

$password=$_GET['password'];

    $sql = "INSERT first_name, last_name, FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->$execute($sql);
    $result = $conn->query($sql);
    
    if ($conn->query($sql) === TRUE) {
        echo "Ο κωδικός είναι έγκυρος.";
        
    } else {
        echo "Ο κωδικός δεν είναι έγκυρος.";
        
    } 

    $conn = null;
?>




<?php
session_start();
?>

<?php
$_SESSION["email"]= $email;
$_SESSION["user_id"]= $user_id;
if (isset($_SESSION["email"]),($_SESSION["user_id"])) {
    $email=$_SESSION["email"];
    $user_id=$_SESSION["user_id"];
} else{

}
?>


