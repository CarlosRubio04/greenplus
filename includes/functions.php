<?php
	
	$displayEstado=array(
		'1'=>'Activo',
		'2'=>'Inactivo'
	);
	
	// Nombre del usuario
	function getNombreUsuario($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM usuarios WHERE idUsuario = '$val'"));
		return $data['nombre'];
	}
	
	// Apellido del usuario
	function getApellidoUsuario($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT apellido FROM usuarios WHERE idUsuario = '$val'"));
		return $data['apellido'];
	}
	
	// Email del usuario
	function getEmailUsuario($val){
		global $con;
		$data=mysqli_fetch_array(mysqli_query($con, "SELECT email FROM usuarios WHERE idUsuario = '$val'"));
		return $data['email'];
	}
	
	// Perfil del usuario
	function getPerfilUsuario($val){
		global $con;
		$data = mysqli_fetch_array(mysqli_query($con, "SELECT introduccion FROM perfiles WHERE usuarioId = '$val'"));
		return $data['introduccion'];
	}
	
	// Solicitar registro del usuario
	function getRegistroUsuario(){
		$html = "";
		$html .= "<div class='modal-header'>";
		$html .= "	<h4>Solo para usuarios registrados</h4>";
		$html .= "</div>";
		$html .= "<div class='modal-body'>";
		$html .= "	<p>Para poder realizar esta operación debes registrarte o iniciar sesión en tu cuenta.</p>";
		$html .= "</div>";
		$html .= "<div class='modal-footer'>";
		$html .= "	<button class='btn btn-default' onclick='mostrarRegistro()'>Registrarme</button>";
		$html .= "	<button class='btn btn-primary' onclick='iniciarSesion()'>Iniciar sesión</button>";
		$html .= "</div>";
		return $html;
	}
	
	
	// Contenido del modal
	function modal($titulo,$contenido,$cta){
		$html = "";
		$html .= "<div class='modal-header'>";
		$html .= $titulo;
		$html .= "</div>";
		$html .= "<div class='modal-body'>";
		$html .= $contenido;
		$html .= "</div>";
		$html .= "<div class='modal-footer'>";
		$html .= $cta;
		$html .= "</div>";
		return $html;
	}
	
	
?>