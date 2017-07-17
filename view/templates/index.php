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
								<a class="root-content" href="#">
									<figure>
										<img src="view/resources/images/post_images/'.$ga_data[$key]['nombre_recurso'].'" alt="item">
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
						<a href="#"><img src="view/resources/web_resources/tutoriales.png" alt="Galerias"></a>
					</div>					
					<div class="contenido-imagenes">
						<div>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
						</div>
					</div> <!--contenido-imagenes-->
				</div> <!--recent-content-->
				<div class="recent-content" id="last">
					<div class="aside-image">
						<a href="#"><img src="view/resources/web_resources/audios.png" alt="Galerias"></a>
					</div>
					<div class="contenido-imagenes">
						<div>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/4.jpg" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
							<a class="root-content" href="#">
								<figure>
									<img src="assets/images/1.png" alt="item">
								</figure>
								<div class="hover-content">
									<img src="assets/images/3.jpg" alt="Imagen de usuario">
									<p class="username">Usuario</p>
									<p class="postname">Nombre del Post</p>
								</div>
							</a>
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