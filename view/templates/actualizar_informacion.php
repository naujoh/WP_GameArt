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
		<div class="jumbotron" id="content_header">
			<h1>Actualiza tu informacion</h1>
		</div>
		<div class="row">
			<form method="POST" action="index.php?action=update_data" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nombre</label>
								<input class="form-control" type="text" name="nombre" value="<?php echo $user_data[0]["nombre"]?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Apellido paterno</label>
								<input class="form-control" type="text" name="apaterno" value="<?php echo $user_data[0]["apaterno"]?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Apellido materno</label>
								<input class="form-control" type="text" name="amaterno" value="<?php echo $user_data[0]["amaterno"]?>">
							</div>
						</div>												
					</div>
					<div class="form-group">
						<label>Sexo</label>
            <?php echo $data_sexo; ?>
					</div>
					<div class="form-group">
						<label>Nombre de usuario</label>
						<input class="form-control" type="text" name="nombre_usuario" value="<?php echo $user_data[0]["nombre_usuario"]?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="text" name="email" value="<?php echo $user_data[0]["email"]?>">
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input class="form-control" type="password" name="contrasena">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
            <img src="view/resources/images/user_images/<?php echo $user_data[0]['imagen_perfil']?>" style="width:150px; height: 150px;">
            <br>
						<label>Imagen de perfil (512x512)</label>
						<input type="file" name="imagen_perfil">
					</div>
					<div class="form-group">
						<label>Biografia (una breve descripcion sobre ti)</label>
						<textarea class="form-control" rows="5" name="biografia"><?php echo $user_data[0]["biografia"]?></textarea>
					</div>
					<div class="form-group">
						<?php 
							if($_SESSION['usuario']['id_rol']==6)
            		echo '<button class="btn btn-success" type="submit" name="enviar" value="premium">Conviertete en premium</button>';
            ?>
						<button class="btn btn-primary " type="submit" name="enviar" value="update">Actualizar informacion</button>
            <button class="send-btn btn btn-danger" type="submit" name="enviar" value="delete">Eliminar cuenta</button>
					</div>
				</div>
				<input type="hidden" name="id_usuario" value="<?php echo $user_data[0]['id_usuario']?>">
				<input type="hidden" name="c" value="user">
			</form>
		</div>
	</div>
	<?php 
	include('view/templates/general_tpl/footer.php'); 
	?>
</body>
</html>
