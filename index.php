<?php 

$username = $_POST["username"];
$password = $_POST["password"];

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
	<!--LOGIN MODAL-->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Welcome to MyChat!</h4>
				</div>
				<form action="index.php" method="get">
					<div class="modal-body">
						<label for="username">Username: </label><input type="text" name="username" id="username" required>
						<br>
						<label for="password">Password: </label><input type="password" name="password" id="password" required>
					</div>
					<div id="test">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" onclick="login();">Login</button>
						<button type="button" class="btn btn-default" onclick="register();">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
	<!--END LOGIN MODAL-->
	
	<!--START LAYOUT-->
	<div class="container">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center center-block" id="left_column">
			<div class="row" id="currentChatInfo">
				<div class="col-md-12">
					<div class="row" id="currentUsername">
					</div>
				</div>
				<div class="col-md-12">
					<div class="row center-block" id="ownAvatar">
					</div>
				</div>
			</div>
			<div class="row" id="availableConvos">
			</div>
		</div>

		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9" id="chat_screen">
			<div class="row" id="messages">
				
			</div>
			<div class="row" id="typingArea">
				
			</div>
		</div>
	</div>

</body>
</html>