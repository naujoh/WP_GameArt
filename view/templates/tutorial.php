<?php include('view/templates/general_tpl/contenido_top.php'); ?>
			<div>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe src="<?php echo $post_data[0]['nombre_recurso'];?>">
						<p>Este navegador no es compatible con el contenido</p>
					</iframe>
				</div>
			</div>
<?php include('view/templates/general_tpl/contenido_bottom.php'); ?>