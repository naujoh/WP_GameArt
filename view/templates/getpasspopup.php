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
				<h2>Recupera tu contrasena</h2>
				<hr>
				<p><?php echo $msg; ?></p>
				<input id="<?php echo $data_form['type'];?>" type="<?php echo $data_form['type'];?>" name="<?php echo $data_form['name'];?>">
				<input id="submit" type="submit" name="enviar" value="<?php echo $data_form['submit_value'];?>">
        <input type="hidden" name="c" value="user">
        <input type="hidden" name="action" value="<?php echo $data_form['action'];?>">				
        <input type="hidden" name="activity" value="<?php echo $data_form['activity'];?>">
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