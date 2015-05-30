	<div class="row">
		<div class="col-md-12">
			<img src="img/perfil.png"class="img-responsive img-circle" style="width: 30%; margin: 0 auto;"alt="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><?php echo getNombreUsuario($_SESSION['id'])." ".getApellidoUsuario($_SESSION['id']); ?></p>
			<p><?php echo "E-mail:"." ".getEmailUsuario($_SESSION['id']); ?></p>
		</div>
	</div>





<!--?php
	$sql="SELECT * FROM perfiles WHERE usuarioId = '$_SESSION[id]'";
	$q=mysqli_query($con, $sql);
	$data=mysqli_fetch_array($q);
?>
<div class="row">
	<div class="col-md-12">
		<h3>Perfil</h3>
	</div>
</div>
<form id="formPerfil">
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Introduzca brevemente su perfil</label>
					<textarea style="min-height: 260px" class="form-control" name="introduccion" id="introduccion" required ><?php echo $data['introduccion'] ?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Documento de identificación</label>
					<select class="form-control" name="documento" id="documento" required >
						<option value="">Seleccione...</option>
						<option <?php if($data['documento'] == 1){ echo('selected'); } ?> value="1">Cédula de Ciudadanía</option>
						<option <?php if($data['documento'] == 2){ echo('selected'); } ?> value="2">Cédula de Extranjería</option>
						<option <?php if($data['documento'] == 3){ echo('selected'); } ?> value="3">Pasaporte</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Número de documento</label>
					<input type="text" class="form-control" name="noDocumento" id="noDocumento" value="<?php echo $data['noDocumento'] ?>" required />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Fecha de nacimiento</label>
					<input type="text" class="form-control datepicker" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $data['fechaNacimiento'] ?>" required />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Lugar de nacimiento</label>
					<input type="text" class="form-control" name="lugarNacimiento" id="lugarNacimiento" value="<?php echo $data['lugarNacimiento'] ?>" required />
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Nacionalidad</label>
					<input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="<?php echo $data['nacionalidad'] ?>" required />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Enfoque laboral</label>
					<select class="form-control" name="enfoque" id="enfoque" required >
						<option value="">Seleccione...</option>
						<option <?php if($data['enfoque'] == 'Administrativo'){ echo('selected'); } ?> value="Administrativo">Administrativo</option>
						<option <?php if($data['enfoque'] == 'Ventas'){ echo('selected'); } ?> value="Ventas">Ventas</option>
						<option <?php if($data['enfoque'] == 'Tecnico'){ echo('selected'); } ?>  value="Tecnico">Técnico</option>
						<option <?php if($data['enfoque'] == 'Proyectos'){ echo('selected'); } ?>  value="Proyectos">Proyectos</option>
						<option <?php if($data['enfoque'] == 'Directivo'){ echo('selected'); } ?>  value="Directivo">Directivo</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Expectativas</label>
					<select class="form-control" name="expectativas" id="expectativas" required >
						<option value="">Seleccione...</option>
						<option <?php if($data['expectativas'] == 'Reubicar'){ echo('selected'); } ?>  value="Reubicar">Reubicarme laboralmente</option>
						<option <?php if($data['expectativas'] == 'Ascender'){ echo('selected'); } ?> value="Ascender">Ascender profesionalmente</option>
						<option <?php if($data['expectativas'] == 'Estabilidad'){ echo('selected'); } ?> value="Estabilidad">Estabilidad laboral</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<input type="hidden" name="consulta" id="consulta" value="perfil" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Actualizar mi perfil</button>
		</div>
	</div>
</form-->
