		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toogle</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand"><img src="view/resources/web_resources/home.png" width="auto" height="50" alt="Home"></a>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse" id="content">
					<ul class="nav navbar-nav" id="center-content">
						<li class="hvr-underline-reveal"><a href="index.php?c=tutorials">Tutoriales</a></li>
						<li class="hvr-underline-reveal"><a href="index.php?c=galeries">Galerias</a></li>
						<li class="hvr-underline-reveal"><a href="index.php?c=audios">Audios</a></li>
						<li class="hvr-underline-reveal"><a href="index.php?c=uploads">Subir</a></li>
						<?php 
						if(!isset($_SESSION['usuario'])) {
						echo '
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown pull-right hvr-back-pulse" id="in_menu">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="login-dropdown">Login<span class="caret"></span></a>
			          <ul id="login-dp" class="dropdown-menu">
			            <li>
			               <div class="row">
			                  <div class="col-md-12">
			                     <form class="form" action="index.php" method="POST" accept-charset="UTF-8" id="login-nav">
			                        <div class="form-group">
			                           <input type="email" class="form-control" id="input-email" placeholder="Email" name="email" required>
			                        </div>
			                        <div class="form-group">
			                           <input type="password" class="form-control" id="input-password" placeholder="Password" name="contrasena" required>
			                           <div class="help-block text-right"><a id="olv_contrasena" href="index.php?c=user&action=recover_password&activity=recover_form">¿Olvido su contrasena?</a></div>
			                        </div>
			                        <div class="form-group">
			                           <button type="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
			                           <input type="hidden" name="c" value="user">
			                           <input type="hidden" name="action" value="login">
			                        </div>
			                     </form>
			                  </div>
			                  <div class="bottom text-center" id="nuevo">
			                    ¿Eres nuevo? <a href="index.php?c=register">Registrate</a>
			                  </div>
			               	</div> <!--row-->
			            </li>
			          </ul> <!--dropdown-menu-->
		        	</li> <!--dropdown pull-right-->	
						</ul> <!--navbar-rifght-->';
					}else{
						if($_SESSION['usuario']['id_rol']!=1){
	            echo
	            '<ul class="nav navbar-nav navbar-right">
	              <li class="dropdown pull-right in_menu">
	                <a href="#" class="image-user dropdown-toggle login-dropdown" data-toggle="dropdown">
	                  <img class="user-images-login" src=view/resources/images/user_images/'.$_SESSION['usuario']['imagen_perfil'].'>
	                </a>
	                <ul class="dropdown-menu">
	                  <li class="in">
	                     <div class="row">
	                        <div class="col-md-12 dropdown-login-user">
	                          <a class="element" href="index.php?c=user&action=show_info&id_usuario='.$_SESSION['usuario']["id_usuario"].'"
	                          >Ver mi perfil</a>
	                          <a class="element" 
	                          href="index.php?c=user&id_usuario='.$_SESSION['usuario']["id_usuario"].'&action=update_form"
	                          >Actualizar mi informacion</a>
	                          <a class="element" href="index.php?c=user&action=publications&id_usuario='.$_SESSION['usuario']["id_usuario"].'&activity=panel">Publicaciones</a>
	                          <a class="element" href="index.php?c=user&action=pdf">Ver donaciones</a>
	                          <a class="element" href="index.php?c=user&action=logout">Cerra sesion</a>
	                        </div>
	                      </div>
	                  </li>
	                </ul>
	              </li>
	            </ul>';
	          }else{
	            echo
	            '<ul class="nav navbar-nav navbar-right">
	              <li class="dropdown pull-right in_menu">
	                <a href="#" class="image-user dropdown-toggle login-dropdown" data-toggle="dropdown">
	                  <img class="user-images-login" src=view/resources/images/user_images/'.$_SESSION['usuario']['imagen_perfil'].'>
	                </a>
	                <ul class="dropdown-menu">
	                  <li class="in">
	                     <div class="row">
	                        <div class="col-md-12 dropdown-login-user">
	                          <a class="element" href="index.php?c=user&action=control_panel&id_usuario='.$_SESSION['usuario']["id_usuario"].'"
	                          >Panel de control</a>
	                          <a class="element" href="index.php?c=user&action=logout">Cerra sesion</a>	                          
	                        </div>
	                      </div>
	                  </li>
	                </ul>
	              </li>
	            </ul>';	          	
	          }						
					}
					?>
					</ul> <!--nav navbar-nav-->
				</div> <!--navbarCollapse-->
			</div> <!--container-->
		</nav>
		<?php
		if(isset($_SESSION['alert']['return_data'])){
			echo '
				<div class="alert alert-'.$_SESSION['alert']['return_data']['color'].' fade in">
				    <a href="#" class="close" data-dismiss="alert">x</a>
				    '.$_SESSION['alert']['return_data']['msg'].'
				</div>
			';
			unset($_SESSION['alert']);
		}
		?>