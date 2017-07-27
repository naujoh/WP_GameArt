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
				<h2>¡Advertencia!</h2>
				<hr>
				<p><?php echo $msg; ?></p>
				<input id="submit" type="submit" name="election" value="si">
				<input id="submit" type="submit" name="election" value="no">
        <input type="hidden" name="c" value="user">
        <input type="hidden" name="action" value="remove">				
			</form>
		</div>
	<!-- Popup Div Ends Here -->
	</div>
</body>
<!-- Body Ends Here -->
</html>