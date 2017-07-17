<!DOCTYPE html>
<html>
<head>
	<?php include('view/templates/general_tpl/general_imports.php'); ?>
	<link rel="stylesheet" type="text/css" href="view/assets/css/crud_style.css">
</head>
<body>	
	<?php include('view/templates/general_tpl/nav.php'); ?>
	<div class="container">
		<?php
		  if(isset($this->model->msg) & isset($this->model->color)){
		    echo '<div class="alert alert-'.$this->model->color.'" role="alert">'.$this->model->msg.'</div>';
		  }
		?>		
		<div class="button_add">
			<h2><?php echo $name_table; ?></h2>
			<a href="index.php?c=crud&action=new&t=<?php echo $this->t;?>" class="btn btn-success" role="button">Nuevo</a>
		</div>
		<table class="table">
			<tr>
				<?php echo $data; ?>
			</tr>
		</table>
	</div>
	<?php include('view/templates/general_tpl/footer.php');?>
</body>
</html>