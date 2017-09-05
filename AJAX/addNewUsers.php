<?php 

include "../../php-chat-db-ajax/connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

$check = $pdo->query("SELECT * FROM Users");
$check_usernames = $check->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
$lenght = count($check_usernames);

foreach ($check_usernames as $key => $value) {

	if($value["username"] == $username) {
		echo "This username already exists, please choose another username";
	}

	else {
		$i++;
	}
}

if($i == $lenght) {
	$username = $pdo->quote($username);
	$password = $pdo->quote($password);
	$sql = "INSERT INTO Users (username, password)
	VALUES ($username, $password)";
	$pdo->prepare($sql)->execute();
	echo "Your account has been added, login to start using MyChat!";
}


?>