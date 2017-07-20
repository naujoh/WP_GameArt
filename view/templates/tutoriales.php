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
									<a href="tutorial.php"><img src="'.$tutorials_data[$key]['nombre_recurso'].'" alt="Portada"></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="info-tutorial">
								<div class="content-tutorial">
									<h3 class="tutorial-name"><a href="tutorial.php">'.$tutorials_data[$key]['titulo'].'</a></h3>
									<p class="tutorial-description">'.$tutorials_data[$key]['resuman'].'</p>
									<div class="bottom-content">
										<p class="user-tutorial"><a href="usuario.php">'.$tutorials_data['nombre_usuario'].'</a></p>
										<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		?>
<!-- 			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="http://img.youtube.com/vi/scIOThgeTbA/0.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/2.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/1.png" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/4.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not image"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="cover-tutorial">
						<div class="image">
							<a href="tutorial.php"><img src="assets/images/cover-tutorial.jpg" alt="not 	"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="info-tutorial">
						<div class="content-tutorial">
							<h3 class="tutorial-name"><a href="tutorial.php">Nombre del tutorial</a></h3>
							<p class="tutorial-description">
								Breve descripcion del tutorial. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<div class="bottom-content">
								<p class="user-tutorial"><a href="usuario.php">Usuario</a></p>
								<p class="count-comments"><span class="glyphicon glyphicon-comment"> 2 Comentarios</span></p>
							</div>
						</div>
					</div>
				</div> -->
			</div> <!--fin row-container-->
		</div> <!-- fin container -->
 	</div>	
<?php 
	include('view/templates/general_tpl/contenidos_bottom.php');
	include('view/templates/general_tpl/footer.php');
?>
</body>
</html>
