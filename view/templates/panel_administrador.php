<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php') ?>
	<div class="container">
		<div class="wrapper">
			<section class="user-information">
				<div class="user-information-content">
					<img src=<?php echo 'view/resources/images/user_images/'.$_SESSION['usuario']['imagen_perfil']?>>
					<h3><?php echo $_SESSION['usuario']['nombre_usuario'];?></h3>
					<h5><?php echo $_SESSION['usuario']['nombre'];?></h5>
					<br>
					<h5>Administrador</h5>
				</div>
			</section>
			<aside class="user-content">
				<div class="content-container">
					<div>
						<h3>Opciones del adminsitrador</h3>
					</div>
          <div>
            <ul class="admin-panel-list">
              <li><a href="index.php?c=crud&t=categoria&action=read">Informacion de categorias</a></li>
              <li><a href="index.php?c=crud&t=tipo_publicacion&action=read">Tipos de publicaciones</a></li>
              <li><a href="index.php?c=crud&t=sexo&action=read">Tabla sexo</a></li>
              <li><a href="index.php?c=crud&t=tipo_pago&action=read">Tipos de pago</a></li>
              <li><a href="index.php?c=crud&t=acceso&action=read">Tipos de acceso a publicaciones</a></li>
              <li><a href="index.php?c=crud&t=nivel_dificultad&action=read">Tutoriales, niveles de dificultad</a></li>       
              <li><a href="index.php?c=crud&t=tipo_recurso&action=read">Tipo de recurso</a></li>       
            </ul>
          </div>
				</div>
			</aside>
		</div>
	</div>
	<?php 
	include('view/templates/general_tpl/footer.php'); 
	?>
</body>
</html>
