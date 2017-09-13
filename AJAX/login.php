<?php 

session_start();

$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

include "../../php-chat-db-ajax/connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

$username = str_replace(' ','',$username); 
$password = str_replace(' ','',$password); 

$check = $pdo->query("SELECT * FROM Users");
$check_usernames = $check->fetchAll(PDO::FETCH_ASSOC);

$i = 0;
$length = count($check_usernames);

foreach ($check_usernames as $key => $value) {
	if($value["username"]==$username) {
		if($value["password"]==$password) {
			echo "success";
			$username = $pdo->quote($username);
			$status = "UPDATE Users SET Available = 1 WHERE username = $username";
			$pdo->prepare($status)->execute();
			break;
		}
		elseif($value["password"]!=$password){
			echo "Wrong password, try again.";
			break;
		}
	}
	else {
		$i++;
	}
}

if($i == $length) {
	echo "Username does not exist, try again. 
	<br>
	If you do not yet have an account, you can create one
	now and start using MyChat straight away!";
}


?>