<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/subir_contenido.css">
	<link rel="stylesheet" type="text/css" href="view/assets/css/crud_style.css">
</head>
<body>
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutoriales</a></li>
    <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galerias</a></li>
    <li role="presentation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Colecciones de audio</a></li>
  </ul>
	<div class="container">
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane fade in active" id="tutorial">
				<div class="row form-content">
					<p>En la siguiente tabla podras ver los detalles de los tutoriales que haz agregado a la plataforma, tambien podras editarlos o eliminarlos. </p>
					<?php echo $tutorials_data; ?>
				</div>	    	
	    </div> <!--Fin tutorial -->
	    <div role="tabpanel" class="tab-pane fade" id="galeria">
				<div class="row form-content">
				<p>En la siguiente tabla podras ver los detalles de las galerias que haz agregado a la plataforma, también podras editarlas o eliminarlas. </p>
					<?php echo $galeries_data; ?>
				</div>	    	
	    </div> <!--Fin galeria-->
	    <div role="tabpanel" class="tab-pane fade" id="audio">
				<div class="row form-content">
					<p>En la siguiente tabla podras ver los detalles de las colecciones de audio que haz agregado a la plataforma, también podras editarlas o eliminarlas. </p>				
					<?php echo $audios_data; ?>
				</div><!--Fin audios-->	    	
	    </div>
	  </div>  
  </div>
	<?php include('view/templates/general_tpl/footer.php'); ?>
</body>
</html>