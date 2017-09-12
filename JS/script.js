$(document).ready(function () {
	//fillUpPage();
	loadMessages();
	window.setInterval(function () {
		loadMessages();
	}, 500);
	

	$("#sendButton").click(function () {
		insertNewMessage();
	});
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

	function insertNewMessage () {
		var message = $("#newMessage").val();

		$.post("AJAX/insertNewMessage.php",
		{
			message: message
		});
		$("#newMessage").val("");
	};

/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	Get messages
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

	function loadMessages () {
		$.ajax({
			url: "getMessages.php",
			success: function (result) {
				$("#messageBoard").html(result);
			}
		})
	};

/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	Get messages
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

	for (var i = 1; i <= $("#availableUsers").length; i++) {
		var target = $("#availableUsers li:nth-child('"+i+"') span").attr("id");
		
	}