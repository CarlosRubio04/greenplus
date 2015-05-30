<?php
	
	session_start();
	
	require_once('conn.php');
	require_once('phpmailer.php');
	require_once('functions.php');
	require_once('config.php');
	
	// Valida registro de email duplicado en el registro
	if($_POST['consulta']=='validaEmail'){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$_POST[emailReg]'"));
		if($n>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	// Inserta nuevo usuario en la base de datos
	if($_POST['consulta']=="registro"){
		if(!mysqli_query($con, "
			INSERT INTO
				usuarios (
					nombre,
					apellido,
					email,
					password,
					status
				) VALUES (
					'$_POST[nombreReg]',
					'$_POST[apellidoReg]',
					'$_POST[emailReg]',
					'".md5($_POST['passwordReg'])."',
					'1'
				)
		")){
			echo 0;
		}else{
			$id=mysqli_insert_id($con);
			$_SESSION['id']=$id;
			$_SESSION['empresa']=0;
			echo 1;
		}
	}
	
	// Cerrar sesión
	if($_POST['consulta']=='cerrarSesion'){
		unset($_SESSION['id']);
		echo 1;
	}
	
	// Iniciar sesión
	if($_POST['consulta']=='iniciarSesion'){
		$n=mysqli_num_rows(mysqli_query($con, "
			SELECT 
				* 
			FROM 
				usuarios 
			WHERE 
				email = '$_POST[emailLogin]' 
			AND 
				password = '".md5($_POST['passwordLogin'])."'"));
		if($n!=1){
		   echo 0;
		}else{
		   $data=mysqli_fetch_array(mysqli_query($con, "SELECT idUsuario,publica,empresa FROM usuarios WHERE email = '$_POST[emailLogin]' AND password = '".md5($_POST['passwordLogin'])."'"));
		   $_SESSION['id']=$data['idUsuario'];
		   $_SESSION['empresa']=$data['empresa'];
		   echo 1;
		}
	}
	
	// Consultar si el usuario existe en el login
	if($_POST['consulta']=='emailExiste'){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$_POST[emailLogin]'"));
		if($n==1){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	// Consultar si el usuario existe en recuperar
	if($_POST['consulta']=='emailExisteRecupera'){
		$n=mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$_POST[emailRecupera]'"));
		if($n==1){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	// Solicitar una nueva contraseña
	if($_POST['consulta']=='solicitaPassword'){
		$sql="SELECT * FROM usuarios WHERE email = '$_POST[emailRecupera]'";
		$q=mysqli_query($con, $sql);
		$data=mysqli_fetch_array($q);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$html='
			<p>Hemos recibido una solicitud para la recuperación de su contraseña.</p>
			<p>Para proceder con la creación de su contraseña, por favor haga click <a href="http://desarrollo.closerdesign.co/trs/index.php?content=recuperar-contrasena&id='.$data['idUsuario'].'&token='.$data['password'].'">aquí</a>.</p>
		';         
		$mail = new PHPMailer();
		$mail->From = 'no-reply@trssolutions.com.co';
		$mail->FromName = 'TRS Solutions';
		$mail->Subject = utf8_decode('Mensaje para la recuperación de su contraseña');
		$mail->Body = utf8_decode($html);
		$mail->IsHTML(true);
		$mail->AddAddress($_POST['emailRecupera']);
		if(!$sent_mail= $mail->Send()){
			echo 0;
		}else{
			echo 1;
		}
	}
	
	// Actualización de perfil
	if($_POST['consulta']=='perfil'){
		$sql="SELECT * FROM perfiles WHERE usuarioId = '$_SESSION[id]'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n==0){
			$sql1="INSERT INTO perfiles (usuarioId, introduccion, documento, noDocumento, fechaNacimiento, lugarNacimiento, nacionalidad, enfoque, expectativas) VALUES ('$_SESSION[id]', '$_POST[introduccion]', '$_POST[documento]', '$_POST[noDocumento]', '$_POST[fechaNacimiento]', '$_POST[lugarNacimiento]', '$_POST[nacionalidad]', '$_POST[enfoque]', '$_POST[expectativas]')";
		}elseif($n==1){
			$sql1="UPDATE perfiles SET introduccion = '$_POST[introduccion]', documento = '$_POST[documento]', noDocumento = '$_POST[noDocumento]', fechaNacimiento = '$_POST[fechaNacimiento]', lugarNacimiento = '$_POST[lugarNacimiento]', nacionalidad = '$_POST[nacionalidad]', enfoque = '$_POST[enfoque]', expectativas = '$_POST[expectativas]' WHERE usuarioId = '$_SESSION[id]'";
		}else{
			echo 0;
		}
		if(!mysqli_query($con, $sql1)){
			echo 0;
		}else{
			echo 1;
		}
	}
	
	
	// Actualiza password
	if($_POST['consulta']=='cambiarPassword'){
		$sql="SELECT * FROM usuarios WHERE idUsuario = '$_SESSION[id]' AND password = '".md5($_POST['currentPassword'])."'";
		$q=mysqli_query($con, $sql);
		$n=mysqli_num_rows($q);
		if($n!=1){
			echo "La contraseña actual suministrada no coincide con la almacenada en nuestros registros.";
		}else{
			if(!mysqli_query($con, "
				UPDATE usuarios SET password = '".md5($_POST['newPassword'])."' WHERE idUsuario = '$_SESSION[id]'
			")){
				echo "Lo sentimos, se ha presentado un error, por favor intente de nuevo.";
			}else{
				echo "Su contraseña ha sido actualizada exitosamente.";
			}
		}
	}
	


	// Procesamiento del formulario de contacto
	if($_POST['consulta']=='contacto'){

		// Determinación de variables
		$nombre = strtoupper($_POST['nombre']);
		$apellido = strtoupper($_POST['apellido']);
		$telefono = strtoupper($_POST['telefono']);
		$email = strtolower($_POST['email']);
		$comentarios = $_POST['comentarios'];
		
		// Sentencia SQL
		$sql = "
			INSERT INTO 
				contacto (
					nombre,
					apellido,
					telefono,
					email,
					comentarios
				) VALUES (
					'$nombre',
					'$apellido',
					'$telefono',
					'$email',
					'$comentarios'
				)
			";
		
		$q = mysqli_query($con,$sql);
		
		if(!$q){
			echo "Se ha presentado un error procesando su solicitud. Por favor inténtelo de nuevo.";
		}else{			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$url=NOTIFICACION;
			$html=file_get_contents($url);
			$contenido="
				<p>A continuación la información relacionada:</p>
				<p>
					<b>Nombre:</b><br />$nombre
				</p>
				<p>
					<b>Teléfono:</b><br />$telefono
				</p>
				<p>
					<b>Email:</b><br />$email
				</p>
				
				<p>
					<b>Mensaje:</b><br />$comentarios
				</p>
			";
			$html=str_replace("{{contenido}}",$contenido,$html);       
			$mail = new PHPMailer();
			$mail->From = '$custom_from';
			$mail->FromName = utf8_decode(FROM_NAME);
			$mail->Subject = "$custom_subject";
			$mail->Body = utf8_decode($html);
			$mail->IsHTML(true);
			$mail->AddAddress("$receiving_email_address");
			$mail->AddBCC(NOTIFICACIONES);		
		    $mail->AddReplyTo($email);
			if(!$sent_mail= $mail->Send()){
				echo "Se ha presentado un error procesando su solicitud. Por favor inténtelo de nuevo.";
			}else{
				echo "Gracias por escribirnos $nombre. Hemos recibido su mensaje y pronto estaremos en contacto.";
			}
		}
	}
	
?>