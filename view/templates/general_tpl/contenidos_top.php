<!DOCTYPE html>
<html>
<head>
	<?php include('general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/galerias_audios_tutoriales.css">
</head>
<body>
	<?php include('nav.php'); ?>
	<div class="panel panel-default">
		<div class="container">
			<div class="panel-body" id="filter">
				<p>Filtrar contenido por:</p> 
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    Todo
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
				    <li><a href="#">Musica de fondo</a></li>
				    <li><a href="#">Efectos de sonido</a></li>
				    <li><a href="#">Ultima semana</a></li>
				    <li><a href="#">Ultimo mes</a></li>
				  </ul>
				</div>
			</div>
		</div>
	</div>