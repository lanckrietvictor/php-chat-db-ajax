$(document).ready(function () {
	//fillUpPage();
});


/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	Filling up the page
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/


	function fillUpPage (username, password) {
		$("#currentUsername").html(username);
	avatar = "Avatar/"+username+".png";			//define (uniform) avatar url
	$.get(avatar) 								//see if file exists
	.done(function () {							//if file exists, execute following code
		$("#ownAvatar").css("background-image", "url(" + avatar + ")");
	})

	.fail(function () {							//if file doesnt exist, execute this code
		$("#fileUpload").html(
			"<form action='avatarUpload.php' method='post'>"+
			"<input type='file' name='avatarToUpload' accept='.png'>"+
			"<input type='submit'>"+
			"</form>");
	})
}

/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	Buttons on page
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/