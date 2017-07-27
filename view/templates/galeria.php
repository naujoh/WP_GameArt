<?php include('general_tpl/contenido_top.php'); ?>
	<div class="row">
		<?php foreach ($post_data as $key => $value) {
			echo 
			'
	    	<div class="col-lg-4 col-md-4 col-xs-6 thumb">
	    		<a target="_blank" class="thumbnail" href="view/resources/images/post_images/'.$post_data[$key]['nombre_recurso'].'">
    				<div class="frame">
    					<div class="frame-in">
		        		<img class="img-responsive" src="view/resources/images/post_images/'.$post_data[$key]['nombre_recurso'].'" alt="imagen_galerias">
    					</div>
    				</div>
  	      </a>
	    	</div>							
			';
		} ?>
	</div>
<?php include('general_tpl/contenido_bottom.php'); ?>