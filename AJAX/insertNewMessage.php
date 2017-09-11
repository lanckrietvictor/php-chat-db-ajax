<?php 

session_start();

include '../connection.php';

$sender = $pdo->quote($_SESSION["username"]);
$sentMessage = $pdo->quote($_POST["message"]);

$newMessage = "INSERT INTO Messages (sender, message) VALUES ($sender, $sentMessage)";
$pdo->prepare($newMessage)->execute();

?>