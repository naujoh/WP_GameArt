				<p id="post-description">
					<?php echo $post_data[0]['descripcion']; ?>
					<br/>
					<br/>
					<br/>
					<?php 
					if(!empty($_SESSION['usuario'])){
						if($post_data[0]['id_tipo_publicacion']==1 || $post_data[0]['id_tipo_publicacion']==2){
							if($post_data[0]['id_acceso']==3 && $_SESSION['usuario']['id_rol'] == 5){
								echo '
								<a href="index.php?c=download&id_publicacion='.$_GET['id_publicacion'].'" class="btn btn-success">Descargar el contenido</a>';
							}else{
								if($post_data[0]['id_acceso']==1){
								echo '
								<a href="index.php?c=download&id_publicacion='.$_GET['id_publicacion'].'" class="btn btn-success">Descargar el contenido</a>';							
								}else{
									if($post_data[0]['id_acceso']==3)
										echo '<i>Para ver el enlace de descarga tienes que ser usuario premium</i>';
								}
							}
						}
					}else{
						echo '<i>Para ver los enlaces de descarga tienes que estar registrado</i>';
					}
					?>
				</p>

			</div>
		</section>
		<aside>
			<div id="info-aside">
					<a href="index.php?c=user&action=show_info&id_usuario=<?php echo $post_data[0]['id_usuario']?>">
						<img id="user-image" src="view/resources/images/user_images/<?php echo $post_data[0]['imagen_perfil']?>">
						<p id="user-name"><b><?php echo $post_data[0]['nombre_usuario']?></b></p>
					</a>
					<div id="details">
						<p id="categoria"><b>Categoria:</b> <?php echo $post_data[0]['categoria']?></p>
						<p id="fecha"><b>Agregado el:</b> <?php echo $post_data[0]['fecha_subida']?></p>
						<p id="tematica"><b>Tags:</b> 
						<?php 
							foreach (explode(",", $post_data[0]['etiquetas']) as $key => $value) {
								echo '<span class="label label-danger">'.$value.'</span> ';
							}
						?>
						<!-- <span class="label label-success"><?php echo $post_data[0]['etiquetas']?></span> -->

						</p>
						<p id="imagenes"><b>Elementos:</b> <?php echo count($post_data)?></p>
					</div>
					<?php 
					if(!empty($_SESSION['usuario'])){
						if($_SESSION['usuario']['id_usuario'] != $post_data[0]['id_usuario'])
							echo '<a id="donacion" href="index.php?c=user&action=donation&activity=form&id_receptor='.$post_data[0]['id_usuario'].'" class="btn btn-warning">Donar al usuario</a>';
					}
					?>
			</div>
		</aside>
		<section id="comments">
		<?php 
			if(count($_SESSION)>0){
				echo'
				<h4>Nuevo Comentario</h4>
				<div class="new-comment">
					<div class="comment-userimage">
						<div class="userimage thumbnail">
							 <a href="index.php?c=user&action=show_info&id_usuario='.$_SESSION['usuario']['id_usuario'].'"><img class="user-photo" src="view/resources/images/user_images/'.$_SESSION['usuario']['imagen_perfil'].'"></a>
						</div>
					</div>
					<form class="panel panel-default comment_panel" action="index.php" method="POST">
						<div class="panel-body">
							<textarea class="form-control" cols="150" rows="5" name="comentario" required></textarea>
						</div>
						<input class="btn btn-primary comment_btn" type="submit" name="comentar" value="Comentar">
						<input type="hidden" name="c" value="comments">
						<input type="hidden" name="action" value="new_comment">
						<input type="hidden" name="id_publicacion" value="'.$_GET['id_publicacion'].'">
						<input type="hidden" name="id_tipo_publicacion" value="'.$post_data[0]['id_tipo_publicacion'].'">
					</form>
				</div>
				';
			}
			?>
			<div>
				<h6><span class="glyphicon glyphicon-comment"></span> <?php echo count($comments_data).' '; ?> Comentarios</h6>
			</div>
			<?php
				foreach ($comments_data as $key => $value) {
					echo '
					<div class="old-comment">
						<div class="comment-userimage">
							<div class="userimage thumbnail">
								 <a href="index.php?c=user&action=show_info&id_usuario='.$comments_data[$key]['id_usuario'].'"><img class="user-photo" src="view/resources/images/user_images/'.$comments_data[$key]['imagen_perfil'].'"></a>
							</div>
						</div>
						<div class="panel panel-default">
								<div class="panel-heading">
										<strong>'.$comments_data[$key]['nombre_usuario'].' </strong><span class="text-muted">'.$comments_data[$key]['fecha_comentario'].'</span>
								</div>
								<div class="panel-body">'.$comments_data[$key]['comentario'].'</div>
						</div>
					</div>
					';
				}
			?>
		</section>
	</div>
<?php include('footer.php'); ?>
</body>
</html>