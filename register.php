<?php
require_once "database.php"; 

$email_or_username = $_POST['email_or_username']; 
$password = $_POST['password']; 

$get_user = $conn->prepare("SELECT * FROM register WHERE (email = :email_or_username OR username = :email_or_username)"); 
$get_user->bindParam(":email_or_username", $email_or_username); 
$get_user->execute(); 

$user = $get_user->fetch(); 

if ($user && password_verify($password, $user['password'])) {
    header('Location: index.php'); 
    exit(); 
} else {
    echo "Invalid email/username or password.";
}
?>