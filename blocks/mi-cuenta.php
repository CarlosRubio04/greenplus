<div class="container" id="mi-cuenta">
	<div class="row">
		<div class="col-md-12">
			<?php
				if(!isset($_SESSION['id'])){
					echo("<p class='text-center'>Acceso restringido.</p>");
				}else{
					?>
					<div class="row">
						<div class="col-md-12">
							<h4 class="text-right"><b><?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']); ?></b></h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="index.php?content=mi-cuenta"><i class="fa fa-home"></i> Inicio</a></li>
								<li><a href="index.php?content=mi-cuenta&tarea=perfil"><i class="fa fa-user"></i> Perfil</a></li>
								<li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModalDonar"><i class="fa fa-user"></i> Haz una donación</a></li>
								<li><a href="index.php?content=mi-cuenta&tarea=cambiar-contrasena"><i class="fa fa-key"></i> Cambiar contraseña</a></li>
								<li><a href="javascript:void(0)" onclick="cerrarSesion()"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
							</ul>
							<hr>
						</div>
						<div class="col-md-9">
							<?php
								if(!isset($_REQUEST['tarea'])){
									require_once('blocks/mi-cuenta/home.php');
								}elseif($_REQUEST['tarea']=='perfil'){
									require_once('blocks/mi-cuenta/perfil.php');
								}elseif($_REQUEST['tarea']=='educacion'){
									require_once('blocks/mi-cuenta/educacion.php');
								}elseif($_REQUEST['tarea']=='experiencia-laboral'){
									require_once('blocks/mi-cuenta/experiencia-laboral.php');
								}elseif($_REQUEST['tarea']=='actividades-extracurriculares'){
									require_once('blocks/mi-cuenta/actividades-extracurriculares.php');
								}elseif($_REQUEST['tarea']=='referencias'){
									require_once('blocks/mi-cuenta/referencias.php');
								}elseif($_REQUEST['tarea']=='cambiar-contrasena'){
									require_once('blocks/mi-cuenta/cambiar-contrasena.php');
								}elseif($_REQUEST['tarea']=='ofertas-laborales'){
									require_once('blocks/mi-cuenta/ofertas-laborales.php');
								}elseif($_REQUEST['tarea']=='aplicantes'){
									require_once('blocks/mi-cuenta/aplicantes.php');
								}elseif($_REQUEST['tarea']=='comprar-creditos'){
									require_once('blocks/mi-cuenta/comprar-creditos.php');
								}else{
									require_once('blocks/mi-cuenta/home.php');
								}
							?>
						</div>	
					</div>
					<?php
				}
			?>
		</div>
	</div>	
</div>