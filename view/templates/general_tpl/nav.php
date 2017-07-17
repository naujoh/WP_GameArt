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
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown pull-right hvr-back-pulse" id="in_menu">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="login-dropdown">Login<span class="caret"></span></a>
			          <ul id="login-dp" class="dropdown-menu">
			            <li>
			               <div class="row">
			                  <div class="col-md-12">
			                     <form class="form" role="form" method="post" t="login" accept-charset="UTF-8" id="login-nav">
			                        <div class="form-group">
			                           <label class="sr-only" for="input-email">Email</label>
			                           <input type="email" class="form-control" id="input-email" placeholder="Email" required>
			                        </div>
			                        <div class="form-group">
			                           <label class="sr-only" for="input-password">Password</label>
			                           <input type="password" class="form-control" id="input-password" placeholder="Password" required>
			                           <div class="help-block text-right"><a id="olv_contrasena" href="">¿Olvido su contrasena?</a></div>
			                        </div>
			                        <div class="form-group">
			                           <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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
						</ul> <!--navbar-rifght-->
					</ul> <!--nav navbar-nav-->
				</div> <!--navbarCollapse-->
			</div> <!--container-->
		</nav>