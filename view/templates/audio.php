<?php include('view/templates/general_tpl/contenido_top.php');?>
<div class="row">
	<?php 
		$c_audios = 1;
		while($c_audios != count($post_data)){
			echo '
			<div class="audio_element col-md-4">
				<img src="view/resources/images/covers/'.$post_data[0]['nombre_recurso'].'">
				<div class="audio_description"><p>'.$post_data[$c_audios]['nombre_recurso'].'</p>
					<p>
						<button type="button" class="baudio btn btn-default" id="btn-pista04">
							<span class="glyphicon glyphicon-play" id="btn-span04"></span>
						</button>
					</p>
				</div>
			</div>
			';
			$c_audios++;
		}
	?>
</div>
<div>
<?php include('view/templates/general_tpl/contenido_bottom.php'); ?>