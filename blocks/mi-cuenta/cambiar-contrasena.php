<div class="row">
	<div class="col-md-12">
		<h3>Cambiar contraseña</h3>
	</div>
</div>

<hr>

<form id="cambiarPassword">
	<div class="row">
		<div class="col-md-4 form-group">
			<label>Contraseña actual</label>
			<input type="password" class="form-control" name="currentPassword" id="currentPassword" required />
		</div>
		<div class="col-md-4 form-group">
			<label>Nueva contraseña</label>
			<input type="password" class="form-control" name="newPassword" id="newPassword" required />
		</div>
		<div class="col-md-4 form-group">
			<label>Confirmar contraseña</label>
			<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required />
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 form-group">
			<input type="hidden" name="consulta" id="consulta" value="cambiarPassword" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Cambiar contraseña</button>
		</div>
	</div>
</form>

<hr>

<div class="row">
	<div class="col-md-12">
		<p>Nota: Por favor tenga en cuenta que una vez el cambio de contraseña sea realizado, deberá ingresar nuevamente al sistema con sus nuevas credenciales.</p>
	</div>
</div>