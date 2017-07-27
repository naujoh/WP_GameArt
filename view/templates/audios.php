<?php include('view/templates/general_tpl/contenidos_top.php'); ?>
	<div class="container">
  	<div class="row">
  	<?php
  	foreach ($audios_data as $key => $value) {
  		echo '
		    <div class="col-md-6">
		  		<div class="parent">
		  			<div class="description">
		          <a href="index.php?c=audios&action=post&id_publicacion='.$audios_data[$key]['id_publicacion'].'"><h4>'.$audios_data[$key]['nombre_recurso'].'</h4></a>
		          <a href="index.php?c=user&action=show_info&id_usuario='.$audios_data[$key]['id_usuario'].'"><p>'.$audios_data[$key]['nombre_usuario'].'</p></a>
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