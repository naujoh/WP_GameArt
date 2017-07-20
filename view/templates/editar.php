<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/crud_style.css">
</head>
<body>	
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<div class="panel-heading">
			<h1>Edita elemento de la tabla <?php echo $this->t; ?></h1>
		</div>
		<form class="well" action="index.php" method="POST">
			<div class="row">
				<div class="form-group col-md-6">
					<label><?php echo strtoupper($this->t); ?></label>
					<input class="form-control" type="text" name="elemento" value="<?php echo $data_edit[0][$this->t]?>">
					<input type="hidden" type="text" name="id" value="<?php echo $data_edit[0]['id_'.$this->t]?>">
					<input type="hidden" type="text" name="id_name" value="<?php echo 'id_'.$this->t; ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<input class="btn btn-success" type="submit" name="send" value="Actualizar">
				</div>
			</div>
			<!-- DUDA -->
			<input type="hidden" name="c" value="crud">
			<input type="hidden" name="t" value="<?php echo $this->t ?>">
			<input type="hidden" name="action" value="update">
		</form>
	</div>
	<?php include('view/templates/general_tpl/footer.php');?>
</body>
</html>