/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	LOGIN MODAL
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

//Open modal on page load
$(document).ready(function () {
	$("#loginModal").modal("show");
});

function register () {
	var username = $("#username").val();
	var password = $("#password").val();

	if(username === "" || password === "" ) {
		$("#test").html("You cannot leave a field empty");
	}

	else {

		$.post("AJAX/addNewUsers.php", 
		{
			username: username, 
			password: password
		},
		function (result) {
			$("#test").html(result);
		});
	}
};

function login () {
	var username = $("#username").val();
	var password = $("#password").val();

	if(username === "" || password === "" ) {
		$("#test").html("You cannot leave a field empty");
	}

	else {
		$.post("AJAX/login.php",
		{
			username: username, 
			password: password
		},
		function (result) {
			if(result == "success") {
				$("#loginModal").modal("hide");
				fillUpPage(username, password);
			}

			else{
				$("#test").html(result);
			}
		})
	}

};

function fillUpPage (username, password) {
	$("#currentUsername").html(username);
	avatar = "../Avatar/"+username+".png";
	$.get(avatar)
		.done(function () {
			$("#ownAvatar").css("background-image", "url(" + avatar + ")");
		})

		.fail(function () {
		})
}