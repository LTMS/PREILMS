<html>
<head>
<title>Chat Application</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
					
					var sendChat = function (message) {
						$.ajax({
					        type: "POST",
					        data :JSON.stringify(message),
					        url: "chat/insert_chat"
					     //   contentType: "application/json"
					    });				
					}
					
					
					// using JQUERY's ready method to know when all dom elements are rendered
					$( document ).ready ( function () {
					// set an on click on the button
					$("form").submit(function (evt) {
					evt.preventDefault();
					var data = $("#text").val();
					$("#text").val('');
					// get the time if clicked via a ajax get queury
					sendChat(data, function (){
					
					});
					});
					setInterval(function (){
					},1500);
					});
		</script>
</head>
<body>
	<h1>Chat Application in Codeigniter</h1>
	<textarea id="received" rows="10" cols="50"></textarea>
	<form>
		<input id="text" type="text" name="user"> <input type="submit"
			value="Send">
	</form>
</body>
</html>
