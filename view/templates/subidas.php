<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="assets/css/subir_contenido.css">
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
					<form method="GET">
						<div class="col-md-12">
							<div class="form-group">
								<label>Agrega el enlace del tutorial</label>
								<input class="form-control" type="text" name="enlace">	
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo del tutorial</label>
								<input class="form-control" type="text" name="titulo_galeria">
							</div>
							<div class="form-group">
								<label>Selecciona una categoria</label>
								<select class="form-control" name="categoria">
									<option selected="selected" value="null" disabled>Selecciona una opción</option>
									<option value="diseno">Diseño</option>
									<option value="programacion">Programacion</option>
									<option value="animacion">Animacion</option>
									<option value="diseno-escenarios">Diseño de escenarios</option>
								</select>
							</div>
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="tematica_galeria">
							</div>
							<div class="form-group">
								<label>Descripción / Resumen (Debe dar a entender al usuario que aprenderá) - 150 caracteres max.</label>
								<textarea class="t_area_desc form-control" rows="4" name="descripcion"></textarea>
							</div>								 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nivel de dificultad que mejor describa al tutorial</label>
								<select class="form-control" name="categoria" placeholder="Selecciona">
									<option selected value="null" disabled>Selecciona una opcion</option>
									<option value="diseno">Fácil</option>
									<option value="programacion">Medio</option>
									<option value="animacion">Avanzado</option>
									<option value="diseno-escenarios">Experto</option>
								</select>
							</div>								
							<div class="form-group">
								<label>Texto del tutorial</label>
								<textarea class="t_area form-control" rows="11" name="descripcion"></textarea>
							</div>	
							<div class="form-group">
								<button class="btn btn-primary" id="send-button">Enviar</button>
							</div>
						</div>
					</form>
				</div>	    	
	    </div> <!--Fin tutorial -->
	    <div role="tabpanel" class="tab-pane fade" id="galeria">
				<div class="row form-content">
					<form method="get">
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo de tu galeria</label>
								<input class="form-control" type="text" name="titulo_galeria">
							</div>
							<div class="form-group">
								<label>Agrega una imagen de portada (512 X 512).</label>
								<input type="file" name="img_1">	
							</div>							
							<div class="form-group">
								<label>Agrega imagenes a tu galeria (6 max).</label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>	
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>	
							</div>
							<div class="form-group">
								<label>Selecciona una categoria</label>
								<select class="form-control">
									<option value="null" selected="selected" disabled>Selecciona una opcion</option>
									<option value="arte2d">Arte 2D</option>
									<option value="arte3d">Arte 3D</option>
									<option value="texturas">Texturas</option>
									<option value="escenarios">Escenarios</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="tematica_galeria">
							</div> 							
							<div class="form-group">
								<label>Selecciona el tipo de acceso al post</label>
								<select class="form-control">
									<option value="null" selected="selected" disabled>Selecciona una opción</option>
									<option value="arte2d">Publico</option>
									<option value="arte3d">Premium</option>
								</select>
							</div>						
							<div class="form-group">
								<label>Agrega una descripcion</label>
								<textarea class="form-control" rows="11" name="descripcion"></textarea>
							</div>	
							<div class="form-group">
								<button class="btn btn-primary" id="send-button">Enviar</button>
							</div>
						</div>
					</form>
				</div>	    	
	    </div> <!--Fin galeria-->
	    <div role="tabpanel" class="tab-pane fade" id="audio">
				<div class="row form-content">
					<form method="get">
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega el titulo a tu coleccion de audio</label>
								<input class="form-control" type="text" name="titulo_galeria">
							</div>
							<div class="form-group">
								<label>Agrega una imagen de portada (512 X 512).</label>
								<input type="file" name="img_1">	
							</div>							
							<div class="form-group">
								<label>Agrega audios a la coleccioón (6 max).</label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>	
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>
								<div class="form-group">
									<input type="file" name="img_1">	
								</div>	
							</div>
							<div class="form-group">
								<label>Selecciona una categoria</label>
								<select class="form-control">
									<option value="null" selected="selected" disabled>Selecciona una opcion</option>
									<option value="arte2d">Arte 2D</option>
									<option value="arte3d">Arte 3D</option>
									<option value="texturas">Texturas</option>
									<option value="escenarios">Escenarios</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Agrega etiquetas (Opcional, terminos adicionales <u>separados por comas</u>)</label>
								<input class="form-control" type="text" name="tematica_galeria">
							</div> 							
							<div class="form-group">
								<label>Selecciona el tipo de acceso al post</label>
								<select class="form-control">
									<option value="null" selected="selected" disabled>Selecciona una opcion</option>
									<option value="arte2d">Publico</option>
									<option value="arte3d">Premium</option>
								</select>
							</div>						
							<div class="form-group">
								<label>Agrega una descripcion</label>
								<textarea class="form-control" rows="11" name="descripcion"></textarea>
							</div>	
							<div class="form-group">
								<button class="btn btn-primary" id="send-button">Enviar</button>
							</div>
						</div>
					</form>
				</div>	    	
	    </div>
	  </div>  
  </div>
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>