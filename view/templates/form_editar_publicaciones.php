<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<form method="POST" action="index.php" enctype="multipart/form-data">
			<div class="col-md-6">
				<div class="form-group">
					<label>Titulo</label>
					<input class="form-control" type="text" name="titulo" value="<?php echo $pub_data[0]['titulo']?>">
				</div>
				<div class="form-group">
					<label>Agrega una imagen de portada (512 X 512).</label>
					<?php
						foreach ($pub_data as $key => $value) {
							if($pub_data[$key]['id_tipo_recurso']==6)
								echo' 
									<img src="view/resources/images/covers/'.$pub_data[$key]['nombre_recurso'].'" width="150">
									';	
						}
					?>
					<input type="file" name="portada">
				</div>							
				<div class="form-group">
					<label>Categoria</label>
					<?php echo $pub_cat; ?>
				</div>
<!-- 				<div class="form-group">
					<input class="btn btn-success" name="images" value="Actualizar imagenes">
				</div> -->
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Etiquetas</label>
					<input class="form-control" type="text" name="etiquetas" value="<?php echo $pub_data[0]['etiquetas']?>">
				</div> 							
				<div class="form-group">
					<label>Tipo de acceso</label>
					<?php echo $pub_access; ?>
				</div>						
				<div class="form-group">
					<label>Agrega una descripcion</label>
					<textarea class="form-control" rows="11" name="descripcion" required><?php echo $pub_data[0]['descripcion']?></textarea>
				</div>	
				<div class="form-group">
					<button class="btn btn-primary" id="send-button" type="submit" name="enviar" value="Enviar">Enviar</button>
				</div>
			</div>
			<input type="hidden" name="c" value="<?php echo $id_type;?>">
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="id_publicacion" value="<?php echo $_GET['id_publicacion']; ?>">
		</form>
	</div>
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>