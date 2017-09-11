<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="JS/jquery-2.2.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="JS/login.js"></script>
</head>
<body>
	<!--LOGIN MODAL-->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Welcome to MyChat!</h4>
				</div>
				<form action="index.php" method="post" id="loginForm" onsubmit="return false">
					<div class="modal-body">
						<label for="username">Username: </label><input type="text" name="username" id="username" required>
						<br>
						<label for="password">Password: </label><input type="password" name="password" id="password" required>
					</div>
					<div id="test">
						
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="login" value="Login">
						<input type="submit" class="btn btn-default" id="register" value="Register">
						<!--<button type="button" class="btn btn-primary" onclick="login();">Login</button>
						<button type="button" class="btn btn-default" onclick="register();">Register</button>-->
					</div>
				</form>
			</div>
		</div>
	</div>		
	<!--END LOGIN MODAL-->
</body>
</html>