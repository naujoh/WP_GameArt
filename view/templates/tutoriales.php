	<?php include('view/templates/general_tpl/contenidos_top.php'); ?>
	<div class="container">
  	<div class="row container">
  	<?php
  		foreach ($tutorials_data as $key => $value) {
  			echo '
					<div class="col-md-6">
						<div class="row">
							<div class="cover-tutorial">
								<div class="image">
									<a href="index.php?c=tutorials&action=post&id_publicacion='.$tutorials_data[$key]['id_publicacion'].'"><img src="view/resources/images/covers/'.$tutorials_data[$key]['nombre_recurso'].'" alt="Portada"></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="info-tutorial">
								<div class="content-tutorial">
									<h3 class="tutorial-name"><a href="index.php?c=tutorials&action=post&id_publicacion='.$tutorials_data[$key]['id_publicacion'].'">'.$tutorials_data[$key]['titulo'].'</a></h3>
									<p class="tutorial-description">'.$tutorials_data[$key]['resumen'].'</p>
									<div class="bottom-content">
										<p class="user-tutorial"><a href="index.php?c=user&action=show_info&id_usuario='.$tutorials_data[$key]['id_usuario'].'">'.$tutorials_data[$key]['nombre_usuario'].'</a></p>
										<p class="count-comments"><span class="glyphicon glyphicon-comment"> '.count($comments_data).' Comentarios</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		?>
		</div> <!--fin row-container-->
	</div> <!-- fin container -->
</div>	
<?php 
	include('view/templates/general_tpl/contenidos_bottom.php');
	include('view/templates/general_tpl/footer.php');
?>
</body>
</html>
