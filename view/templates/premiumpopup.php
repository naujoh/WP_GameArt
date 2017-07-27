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
			<form action="index.php" id="form" method="POST" name="form">
				<img id="close" src="view/resources/web_resources/close.png" onclick ="div_hide()">
				<h2>Conviertete en usuario premium</h2>
				<hr>
				<?php echo $msg; ?>
				<input id="submit" type="submit" name="enviar" value="Premium ahora!">
        <input type="hidden" name="c" value="user">
        <input type="hidden" name="action" value="premium-convert">				
        <?php 
      		if($llave!=null)
    				echo '<input type="hidden" name="llave" value="'.$llave.'">'
      	?>				
			</form>
		</div>
	<!-- Popup Div Ends Here -->
	</div>
</body>
<!-- Body Ends Here -->
</html>