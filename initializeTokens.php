<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshop";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("CALL tokens_distribution()");
$result = $conn->query("UPDATE user SET user.total_tokens = total_tokens + cur_tokens;");
$result = $conn->query("UPDATE user SET user.total_score = total_score + score;");
$result = $conn->query("UPDATE user SET user.cur_tokens = 0;");
$result = $conn->query("UPDATE user SET user.score = 0;");
