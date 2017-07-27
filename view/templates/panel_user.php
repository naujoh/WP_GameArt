<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<div class="wrapper">
			<section class="user-information">
				<div class="user-information-content">
					<img src=<?php echo 'view/resources/images/user_images/'.$user_data[0]['imagen_perfil']?>>
					<h3><?php echo $user_data[0]['nombre_usuario'];?></h3>
					<h5><?php echo $user_data[0]['nombre'];?></h5>
					<br>
					<h3>Biografia</h3>
					<p><?php echo $user_data[0]['biografia']?></p>
					<br>
					<?php 
						// print_r($_SESSION); die();
						if($_SESSION['usuario']['id_rol']==6){
							echo '<a class="btn btn-success" href="index.php?c=user&action=premium_form">Conviertete a premium </a>';
						}
					?>
				</div>
			</section>
			<aside class="user-content">
				<div class="content-container">
					<div class="uploads-count">
						<h3>Galerias subidas: <?php echo count($galeries_data);?></h3>
					</div>
					<div class="upload-items">
						<div class="row">
							<?php
							foreach ($galeries_data as $key => $value){
								echo '
								<div class="col-lg-3 col-md-4 col-xs-6 thumb">
		    					<a class="thumbnail" href="index.php?c=galeries&action=post&id_publicacion='.$galeries_data[$key]["id_publicacion"].'">
			    					<div class="frame">
			    						<div class="frame-in">
					        			<img class="img-responsive" src="view/resources/images/covers/'.$galeries_data[$key]["nombre_recurso"].'" alt="Portada">
			    						</div>
			    					</div>
			       	 		</a>
		    				</div>';
							}
							?>
						</div> <!--row-->
					</div> <!--upload-items-->
					<div class="uploads-count">
						<h3>Colecciones de audio subidas: <?php echo count($audios_data);?></h3>
					</div>
					<div class="upload-items">
						<div class="row">
							<?php
							foreach ($audios_data as $key => $value){
								echo '
								<div class="col-lg-3 col-md-4 col-xs-6 thumb">
		    					<a class="thumbnail" href="index.php?c=audios&action=post&id_publicacion='.$audios_data[$key]["id_publicacion"].'">
			    					<div class="frame">
			    						<div class="frame-in">
					        			<img class="img-responsive" src="view/resources/images/covers/'.$audios_data[$key]["nombre_recurso"].'" alt="Portada">
			    						</div>
			    					</div>
			       	 		</a>
		    				</div>';
							}
							?>
						</div> <!--row-->
					</div> <!--upload-items-->
					<div class="uploads-count">
						<h3>Tutoriales subidos: <?php echo count($tutorials_data);?></h3>
					</div>
					<div class="upload-items">
						<div class="row">
							<?php
							foreach ($tutorials_data as $key => $value){
								echo '
								<div class="col-lg-3 col-md-4 col-xs-6 thumb">
		    					<a class="thumbnail" href="index.php?c=tutorials&action=post&id_publicacion='.$tutorials_data[$key]["id_publicacion"].'">
			    					<div class="frame">
			    						<div class="frame-in">
					        			<img class="img-responsive" src="view/resources/images/covers/'.$tutorials_data[$key]["nombre_recurso"].'" alt="Portada">
			    						</div>
			    					</div>
			       	 		</a>
		    				</div>';
							}
							?>
						</div> <!--row-->
					</div> <!--upload-items-->					
				</div> <!--content container-->
			</aside>
		</div>
	</div>
	<?php include('view/templates/general_tpl/footer.php');?>
</body>
</html>
