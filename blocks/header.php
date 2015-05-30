
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><img src="img/letra.png" alt="" class="img-responsive" id="logo"></a></li>
				<li><a href="#quienes-somos">Quienes somos</a></li>
				<li><a href="#producto">Productos</a></li>
				<li><a href="?content=nosotros">Haz tu donación</a></li>
				<li><a href="#contact">Contáctenos</a></li>
				<?php if(!isset($_SESSION['id'])){ ?>
				<li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModalRegistro">
					<i class="fa fa-plus-circle"></i> Regístrate</a>
				</li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if(!isset($_SESSION['id'])){ ?>
				<li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModalLogin">
					<i class="fa fa-user"></i> Iniciar sesión</a>
				</li>
				<?php }else{ ?>
				<li><a href="index.php?content=mi-cuenta">
					<i class="fa fa-user"></i> Mi cuenta</a>
				</li>
				<?php } ?>
				<?php if(isset($_SESSION['id'])){ ?>
				<li><a href="javascript:void(0)" onclick="cerrarSesion()">
					<i class="fa fa-sign-out"></i> Cerrar sesión</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
