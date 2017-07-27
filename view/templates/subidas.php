<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
    <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galeria</a></li>
    <li role="presentation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Coleccion de audio</a></li>
  </ul>
	<div class="container">
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane fade in active" id="tutorial">
				<div class="row form-content">
					<form method="POST" action="index.php" enctype="multipart/form-data">
						<div class="col-md-12">
							<div class="form-group">
								<label>Agrega el enlace del tutorial</label>
								<input class="form-control" type="text" name="enlace" required>	
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo del tutorial</label>
								<input class="form-control" type="text" name="titulo" required>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Selecciona una categoria</label>
									<?php echo $cat_tutorials; ?>
								</div>
								<div class="col-md-6 form-group">
									<label>Portada para el tutorial (512 x 512)</label>
									<input type="file" name="portada">
								</div>		
							</div>		
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="etiquetas">
							</div>
							<div class="form-group">
								<label>Descripción / Resumen (Debe dar a entender al usuario que aprenderá) - 150 caracteres max.</label>
								<textarea class="t_area_desc form-control" rows="4" name="resumen" required></textarea>
							</div>								 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nivel de dificultad que mejor describa al tutorial</label>
								<?php echo $dificulty_t; ?>
							</div>								
							<div class="form-group">
								<label>Texto del tutorial</label>
								<textarea class="t_area form-control" rows="11" name="descripcion" required></textarea>
							</div>	
							<div class="form-group">
								<button class="btn btn-primary" id="send-button">Enviar</button>
							</div>
						</div>
						<input type="hidden" name="c" value="tutorials">
						<input type="hidden" name="action" value="upload">
						<input type="hidden" name="id_publicacion" value="<?php echo $_GET['id_publicacion']; ?>">
					</form>
				</div>	    	
	    </div> <!--Fin tutorial -->
	    <div role="tabpanel" class="tab-pane fade" id="galeria">
				<div class="row form-content">
					<form method="POST" action="index.php" enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo de tu galeria</label>
								<input class="form-control" type="text" name="titulo" required>
							</div>
							<div class="form-group">
								<label>Agrega una imagen de portada (512 X 512).</label>
								<input type="file" name="portada">	
							</div>							
							<div class="form-group">
								<label>Agrega imagenes a tu galeria (6 max).</label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="file" name="galeria[]" required>	
								</div>
								<div class="form-group">
									<input type="file" name="galeria[]">	
								</div>
								<div class="form-group">
									<input type="file" name="galeria[]">	
								</div>	
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<input type="file" name="galeria[]">	
								</div>
								<div class="form-group">
									<input type="file" name="galeria[]">	
								</div>
								<div class="form-group">
									<input type="file" name="galeria[]">	
								</div>	
							</div>
							<div class="form-group">
								<label>Selecciona una categoria</label>
								<?php echo $cat_galeries; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="etiquetas">
							</div> 							
							<?php
							if($_SESSION['usuario']['id_rol']==5)
								echo '
								<div class="form-group">
									<label>Selecciona el tipo de acceso al post</label>
									'.$cat_tpub.'
								</div>
								';
							?>						
							<div class="form-group">
								<label>Agrega una descripcion</label>
								<textarea class="form-control" rows="11" name="descripcion" required></textarea>
							</div>	
							<div class="form-group">
								<button class="btn btn-primary" id="send-button" type="submit" name="enviar" value="Enviar">Enviar</button>
							</div>
						</div>
						<input type="hidden" name="c" value="galeries">
						<input type="hidden" name="action" value="upload">
					</form>
				</div>	    	
	    </div> <!--Fin galeria-->
	    <div role="tabpanel" class="tab-pane fade" id="audio">
				<div class="row form-content">
					<form method="POST" action="index.php" enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo a tu coleccion de audio</label>
								<input class="form-control" type="text" name="titulo" required>
							</div>
							<div class="form-group">
								<label>Agrega una imagen de portada (512 X 512).</label>
								<input type="file" name="portada">	
							</div>							
							<div class="form-group">
								<label>Agrega audios a la coleccioón (6 max).</label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="file" name="audio[]" required>	
								</div> 
								<div class="form-group">
									<input type="file" name="audio[]">	
								</div>
								<div class="form-group">
									<input type="file" name="audio[]">	
								</div>	
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<input type="file" name="audio[]">	
								</div>
								<div class="form-group">
									<input type="file" name="audio[]">	
								</div>
								<div class="form-group">
									<input type="file" name="audio[]">	
								</div>	
							</div>
							<div class="form-group">
								<label>Selecciona una categoria</label>
								<?php echo $cat_audios; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="etiquetas">
							</div> 							
							<?php
							if($_SESSION['usuario']['id_rol']==5)
								echo'
									<div class="form-group">
										<label>Selecciona el tipo de acceso al post</label>
											'.$cat_tpub.'
									</div>
								';						
							?>
							<div class="form-group">
								<label>Agrega una descripcion</label>
								<textarea class="form-control" rows="11" name="descripcion" required></textarea>
							</div>	
							<div class="form-group">
								<button type="submit" name="enviar" value="Enviar" class="btn btn-primary" id="send-button">Enviar</button>
							</div>
						</div>
						<input type="hidden" name="c" value="audios">
						<input type="hidden" name="action" value="upload">
					</form>
				</div>	    	
	    </div>
	  </div>  
  </div> <!--container-->
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>