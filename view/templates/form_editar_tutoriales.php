<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<div class="form-content">
			<form method="POST" action="index.php" enctype="multipart/form-data">
				<div class="col-md-12">
					<div class="form-group">
						<label>Enlace del tutorial</label>
						<?php 
							// echo '<pre>';
							// print_r($tutorial_data);
							// echo '</pre>';
							// die();
						?>
						<input class="form-control" type="text" name="enlace" value="<?php echo $tutorial_data[0]['nombre_recurso']?>">	
					</div>							
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Titulo del tutorial</label>
						<input class="form-control" type="text" name="titulo" value="<?php echo $tutorial_data[0]['titulo'] ?>">
					</div>
					<div class="row">
					</div>		
					<div class="form-group">
						<label>Etiquetas</label>
						<input class="form-control" type="text" name="etiquetas" value="<?php echo $tutorial_data[0]['etiquetas'] ?>">
					</div>
					<div class="form-group">
						<label>Descripción / Resumen</label>
						<textarea class="t_area_desc form-control" rows="4" name="resumen"><?php echo $tutorial_data[0]['resumen'] ?></textarea>
					</div>								 
					<div class="form-group">
						<label>Categoria</label>
						<?php echo $cat_tutorials; ?>
					</div>
					<div class="form-group">
						<label>Nivel de dificultad</label>
						<?php echo $dificulty_t; ?>
					</div>
				</div>
				<div class="col-md-6">
						<img src="view/resources/images/covers/<?php echo $tutorial_data[1]['nombre_recurso']?>" width="95" height="95">
					<div class="form-group">
						<input type="file" name="portada">
					</div>													
					<div class="form-group">
						<label>Texto del tutorial</label>
						<textarea class="t_area form-control" rows="4" name="descripcion"><?php echo $tutorial_data[0]['descripcion'] ?></textarea>
					</div>	
					<!-- <input class="btn btn-primary" id="send-button">Actualizar</input> -->
					<input class="btn btn-primary" id="send-button" type="submit" value="Actualizar" name="enviar">
				</div>
				<input type="hidden" name="c" value="tutorials">
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="id_publicacion" value="<?php echo $_GET['id_publicacion']; ?>">
			</form>
		</div>
	</div>
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>