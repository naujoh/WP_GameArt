<?php include('view/templates/general_tpl/contenidos_top.php'); ?>
	<div class="container">
  	<div class="row">
  	<?php
  	foreach ($audios_data as $key => $value) {
  		echo '
		    <div class="col-md-6">
		  		<div class="parent">
		  			<div class="description">
		          <a href="audio.php"><h4>'.$audios_data[$key]['nombre_recurso'].'</h4></a>
		          <a href=""><p>'.$audios_data[$key]['nombre_usuario'].'</p></a>
	      		</div>
		      	<div class="control-button">
		          <button type="button" class="baudio btn btn-default" id="btn-pista01"><span class="glyphicon glyphicon-play" id="btn-span01"></span></button>
		          <audio id="pista01" src="assets/sounds/pista1.wav"></audio>
	      		</div>
		  		</div>
		    </div>
	    '; 
	  }
    ?>
<!-- 	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista02"><span class="glyphicon glyphicon-play" id="btn-span02"></span></button>
	          <audio id="pista02" src="assets/sounds/pista2.wav"></audio>
      		</div>
	  		</div>
	    </div> 
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista03"><span class="glyphicon glyphicon-play" id="btn-span03"></span></button>
	          <audio id="pista03" src="assets/sounds/pista3.wav"></audio>
      		</div>
	  		</div>
	    </div> 
	   	<div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista04"><span class="glyphicon glyphicon-play" id="btn-span04"></span></button>
	          <audio id="pista04" src="assets/sounds/pista4.wav"></audio>
      		</div>
	  		</div>
	    </div> 
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista05"><span class="glyphicon glyphicon-play" id="btn-span05"></span></button>
	          <audio id="pista05" src="assets/sounds/pista5.wav"></audio>
      		</div>
	  		</div>
	    </div>  
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista06"><span class="glyphicon glyphicon-play" id="btn-span06"></span></button>
	          <audio id="pista06" src="assets/sounds/pista1.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista07"><span class="glyphicon glyphicon-play" id="btn-span07"></span></button>
	          <audio id="pista07" src="assets/sounds/pista2.wav"></audio>
      		</div>
	  		</div>
	    </div>
 			<div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista08"><span class="glyphicon glyphicon-play" id="btn-span08"></span></button>
	          <audio id="pista08" src="assets/sounds/pista3.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista09"><span class="glyphicon glyphicon-play" id="btn-span09"></span></button>
	          <audio id="pista09" src="assets/sounds/pista4.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista10"><span class="glyphicon glyphicon-play" id="btn-span10"></span></button>
	          <audio id="pista10" src="assets/sounds/pista5.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista11"><span class="glyphicon glyphicon-play" id="btn-span11"></span></button>
	          <audio id="pista11" src="assets/sounds/pista1.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista12"><span class="glyphicon glyphicon-play" id="btn-span12"></span></button>
	          <audio id="pista12" src="assets/sounds/pista2.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista13"><span class="glyphicon glyphicon-play" id="btn-span13"></span></button>
	          <audio id="pista13" src="assets/sounds/pista3.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista14"><span class="glyphicon glyphicon-play" id="btn-span14"></span></button>
	          <audio id="pista14" src="assets/sounds/pista4.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista15"><span class="glyphicon glyphicon-play" id="btn-span15"></span></button>
	          <audio id="pista15" src="assets/sounds/pista5.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista16"><span class="glyphicon glyphicon-play" id="btn-span16"></span></button>
	          <audio id="pista16" src="assets/sounds/pista1.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista17"><span class="glyphicon glyphicon-play" id="btn-span17"></span></button>
	          <audio id="pista17" src="assets/sounds/pista2.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista18"><span class="glyphicon glyphicon-play" id="btn-span18"></span></button>
	          <audio id="pista18" src="assets/sounds/pista3.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista19"><span class="glyphicon glyphicon-play" id="btn-span19"></span></button>
	          <audio id="pista19" src="assets/sounds/pista4.wav"></audio>
      		</div>
	  		</div>
	    </div>
	    <div class="col-md-6">
	  		<div class="parent">
	  			<div class="description">
	          <a href="audio.php"><h4>Nombre del audio</h4></a>
	          <a href=""><p><i>nombre de usuario</i></p></a>
      		</div>
	      	<div class="control-button">
	          <button type="button" class="baudio btn btn-default" id="btn-pista20"><span class="glyphicon glyphicon-play" id="btn-span20"></span></button>
	          <audio id="pista20" src="assets/sounds/pista5.wav"></audio>
      		</div>
	  		</div>
	    </div> -->
   	</div> <!--Fin row-->
 	</div>
	<?php 
	include('view/templates/general_tpl/contenidos_bottom.php');
	include('view/templates/general_tpl/footer.php'); 
	?>
	<script>
		var playing = false;
		$("button").click(function(){
			if(this.className === "baudio btn btn-default"){
				var id_btn = this.id;
				var dig  = id_btn.substring(9, id_btn.length);
				var audio = document.getElementById("pista".concat(dig));
				var span = document.getElementById("btn-span".concat(dig));
				if(!playing){
					audio.play();
					playing=true;
					document.getElementById("btn-span".concat(dig)).className="glyphicon glyphicon-pause";
				}else{
					audio.pause();
					playing=false;
					document.getElementById("btn-span".concat(dig)).className="glyphicon glyphicon-play";
				}
			}
		});
 	</script>
</body>
</html>