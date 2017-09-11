<?php 

session_start();

if(!isset($_SESSION["username"])){
	header("Location: firstPage.php");
}

include 'connection.php';

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$sql = $pdo->query("SELECT * FROM Users");
$tableUsers = $sql->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["deconnect"])){
	session_destroy();
	header("Refresh:0");
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="JS/jquery-2.2.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="JS/script.js"></script>
</head>
<body>
	
	<!--START LAYOUT-->
	<div class="container-fluid">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center center-block" id="left_column">
			<div class="row" id="currentChatInfo">
				<div class="col-md-12">
					<div class="row" id="currentUsername">
						<?php echo $username; ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row center-block" id="ownAvatar">
					</div>
					<div class="row" id="fileUpload"></div>
				</div>
			</div>
			<div class="row" id="availableConvos">
				<ul class="list-group">
					<?php 

					foreach ($tableUsers as $key => $value) {
						if($value["username"] !== $username) {
							echo "<li class='list-group-item'>".$value["username"]."</li>";
						}
					}

					?>
				</ul>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<form action="index.php" method="post">
							<input type="submit" name="deconnect" value="Deconnect">
						</form>
					</div>	
				</div>
			</div>
		</div>

		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9" id="chat_screen">
			<div class="row" id="messages">
				<div class="row" id="infoContact">
					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" id="smallAvatar"></div>
					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8" id="usernameContact">
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php

						/*echo $username;

						foreach ($tableUsers as $key => $value) {
							if($value["username"] !== $username) {
								echo "<li>".$value["username"]."</li>";
							}
						}*/

						?>
					</div>
				</div>			
			</div>
			<div class="row" id="typingArea">
				<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10" id="textareaContainer">
					<textarea name="newMessage" id="newMessage"></textarea>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" id="sendContainer">
					<button class="btn btn-default" id="sendButton">
						<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>