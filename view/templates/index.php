<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/main.css">
</head>
<body>
	<div id="wrapper">
		<?php include('view/templates/general_tpl/nav.php') ?>
		<div id="content-main">
			<div id="main-image">
				<img src="view/resources/web_resources/main.png" alt="Main">
			</div>
			<div id="welcome-message">
				<h1>¡Bienvenido a GameArt!</h1>
				<p>El lugar donde encontrarás los recursos que necesitas para crear tus videojuegos.</p>
			</div>			
			<div class="container">
				<div class="recent-content">
					<div class="aside-image">
						<a href="#"><img src="view/resources/web_resources/galeria.png" alt="Galerias"></a>
					</div>
					<div class="contenido-imagenes">
						<div>
							<?php
						  foreach ($ga_data as $key => $value) {
								echo '
								<a class="root-content" href="index.php?c=galeries&action=post&id_publicacion='.$ga_data[$key]['id_publicacion'].'">
									<figure>
										<img src="view/resources/images/covers/'.$ga_data[$key]['nombre_recurso'].'" alt="item">
									</figure>
									<div class="hover-content hvr-radial-out">
										<div class="hvr-pop">
											<img class="" src="view/resources/images/user_images/'.$ga_data[$key]['imagen_perfil'].'" alt="Imagen de usuario">
											<p class="username hvr-grow">'.$ga_data[$key]['nombre_usuario'].'</p>
											<p class="postname">'.$ga_data[$key]['titulo'].'</p>
										</div>
									</div>
								</a>';
							} 
							?>
						</div>
					</div> <!--contenido-imagenes-->
				</div> <!--recent-content-->
				<div class="recent-content">
					<div class="aside-image">
						<a href="#"><img src="view/resources/web_resources/tutoriales.png" alt="Tutoriales"></a>
					</div>					
					<div class="contenido-imagenes">
						<div>
							<?php
						  foreach ($tu_data as $key => $value) {
								echo '
								<a class="root-content" href="index.php?c=tutorials&action=post&id_publicacion='.$tu_data[$key]['id_publicacion'].'">
									<figure>
										<img src="view/resources/images/covers/'.$tu_data[$key]['nombre_recurso'].'" alt="item">
									</figure>
									<div class="hover-content hvr-radial-out">
											<div class="hvr-pop">
											<img class="" src="view/resources/images/user_images/'.$tu_data[$key]['imagen_perfil'].'" alt="Imagen de usuario">
											<p class="username hvr-grow">'.$tu_data[$key]['nombre_usuario'].'</p>
											<p class="postname">'.$tu_data[$key]['titulo'].'</p>
										</div>
									</div>
								</a>';
							} 
							?>
						</div>
					</div> <!--contenido-tutoriales-->
				</div> <!--recent-content-->
				<div class="recent-content" id="last">
					<div class="aside-image">
						<a href="#"><img src="view/resources/web_resources/audios.png" alt="Audios"></a>
					</div>
					<div class="contenido-imagenes">
						<div>
							<?php
						  foreach ($au_data as $key => $value) {
								echo '
								<a class="root-content" href="index.php?c=audios&action=post&id_publicacion='.$au_data[$key]['id_publicacion'].'">
									<figure>
										<img src="view/resources/images/covers/'.$au_data[$key]['nombre_recurso'].'" alt="item">
									</figure>
									<div class="hover-content hvr-radial-out">
											<div class="hvr-pop">
											<img class="" src="view/resources/images/user_images/'.$au_data[$key]['imagen_perfil'].'" alt="Imagen de usuario">
											<p class="username hvr-grow">'.$au_data[$key]['nombre_usuario'].'</p>
											<p class="postname">'.$au_data[$key]['titulo'].'</p>
										</div>
									</div>
								</a>';
							} 
							?>
						</div>
					</div> <!--contenido-imagenes-->
				</div> <!--recent-content-->
			</div> <!--container-->
		</div> <!--content-main-->
	</div><!--wrapper-->
<?php 
	include('view/templates/general_tpl/footer.php');
?>
</body>
</html>