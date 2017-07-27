<!DOCTYPE html>
<html>
<head>
<title>Popup contact form</title>
<link href="view/assets/css/popup.css" rel="stylesheet">
<script src="view/assets/js/popup_window.js"></script>
</head>
<!-- Body Starts Here -->
<body id="body" style="overflow:hidden;">
	<div id="abc">
		<!-- Popup Div Starts Here -->
		<div id="popupContact">
			<!-- Contact Us Form -->
			<form action="index.php" id="form" method="post" name="form">
				<img id="close" src="view/resources/web_resources/close.png" onclick ="div_hide()">
				<h2>Iniciar Sesion</h2>
				<hr>
				<p><?php echo $msg; ?></p>
				<input id="email" name="email" placeholder="Correo electronico" type="email" required>
				<input id="password" name="contrasena" placeholder="Contrasena" type="password" required>
				<p id="recover_pass"><a href="index.php?c=user&action=recover_password&activity=recover_form">Olvidaste tu contrasena?</a></p>
				<input id="submit" type="submit" name="login" value="iniciar">
        <input type="hidden" name="c" value="user">
        <input type="hidden" name="action" value="login">				
				<p id="new">Eres nuevo? <a href="index.php?c=register">Registrate!</a></p>
			</form>
		</div>
	<!-- Popup Div Ends Here -->
	</div>
</body>
<!-- Body Ends Here -->
</html>