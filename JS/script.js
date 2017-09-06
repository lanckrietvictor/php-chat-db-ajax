/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	LOGIN MODAL
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

//Open modal on page load
$(document).ready(function () {
	$("#loginModal").modal("show");
});

//Registration

function register () {
	var username = $("#username").val();
	var password = $("#password").val();

	if(username === "" || password === "" ) {		//Make sure UN and PW ar entered
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

//Login

function login () {
	var username = $("#username").val();
	var password = $("#password").val();

	if(username === "" || password === "" ) {		//Make sure UN and PW ar entered
		$("#test").html("You cannot leave a field empty");
	}

	else {
		$.post("AJAX/login.php",
		{
			username: username, 
			password: password
		},
		function (result) {
			if(result == "success") {				//Close modal if login is correct
				$("#loginModal").modal("hide");
				fillUpPage(username, password);
			}

			else{
				$("#test").html(result);			//Explain why login didn't work
			}
		})
	}

};

/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	Filling up the page
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/


function fillUpPage (username, password) {
	$("#currentUsername").html(username);
	avatar = "Avatar/"+username+".png";
	$.get(avatar)
	.done(function () {
		$("#ownAvatar").css("background-image", "url(" + avatar + ")");
	})

	.fail(function () {
		$("#fileUpload").html(
			"<form action='avatarUpload.php' method='post'>"+
			"<input type='file' name='avatarToUpload' accept='.png'>"+
			"<input type='submit'>"+
			"</form>");
		})
	}