<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<div class="jumbotron" id="content_header">
			<h1>Registrate!</h1>
		</div>
		<div class="row form-content">
			<form method="POST" t="index.php" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Nombre</label>
								<input class="form-control" type="text" name="nombre" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Apellido paterno</label>
								<input class="form-control" type="text" name="apaterno" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Apellido materno</label>
								<input class="form-control" type="text" name="amaterno" required>
							</div>
						</div>	
					</div>									
					<div class="form-group">
						<label>Sexo</label>
						<?php echo $sexo_data; ?>		
					</div>
					<div class="form-group">
						<label>Nombre de usuario (como el mundo te conocerá)</label>
						<input class="form-control" type="text" name="nombre_usuario" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email" required>
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input class="form-control" type="password" name="contrasena" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Imagen de perfil (tamaño recomendado 150x150)</label>
						<input type="file" name="perfil_image">
					</div>
					<div class="form-group">
						<label>Biografia (una breve descripcion sobre ti)</label>
						<textarea class="form-control" rows="14" name="biografia" placeholder="Escribe algo sobre ti ..." required></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" id="send-button" type="submit" name="new_register">Resgistrar</button>
					</div>
				</div>
				<input type="hidden" name="c" value="register">
			</form>
		</div> <!--row-->
	</div> <!--container-->
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>