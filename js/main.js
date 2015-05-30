// Idioma del validador
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});



// Funciones
	
	// Cargar
	function cargar(){
		$('.loader').fadeIn();
	}
	
	// Descargar
	function descargar(){
		$('.loader').fadeOut();
	}
	
	// Modal Vacio
	function modal(data){
		descargar();
		$('#myModalVacioContenido').html(data);
		$('#myModalVacio').modal('show');
	}
	
	function iniciarSesion(){
		descargar();
		$('#myModalVacio').modal('hide');
		$('#myModalLogin').modal('show');
	}
	
	function mostrarRegistro(){
		descargar();
		$('#myModalVacio').modal('hide');
		$('#myModalRegistro').modal('show');
	}
	
	function actualizaCreditos(){
		$.post('includes/php.php',{
			consulta: "actualizaCreditos"
		}).done(function(data){
			$('#creditos-disponibles').html(data)
		})
	}

// Acciones en la carga del sitio
$(document).ready(function(){
	// Descargar el cargador
	$('.loader').fadeOut('slow');
});

$(function() {
	$( ".datepicker" ).datepicker({
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
});


//Form footer
$('#formFooter').validate({
	submitHandler: function(form){
		cargar();
		$.post('includes/php.php',$('#formFooter').serialize())
		.done(function(data){
			$('.form-control').val('');
			descargar();
			bootbox.alert(data, function() {console.log("Alert Callback");})
		})
	}
});

//Form Contacto
$('#contacto').validate({
	submitHandler: function(form){
		cargar();
		$.post('includes/php.php',$('#formContacto').serialize())
		.done(function(data){
			$('.form-control').val('');
			descargar();
			bootbox.alert(data, function() {console.log("Alert Callback");})
		})
	}
});

// Validar registro
$('#formRegistro').validate({
	rules: {
		emailReg: {
			remote: {
				url: "includes/php.php",
				type: "post",
				data: {
					consulta: "validaEmail"
				}
			}
		},
		passwordReg: {
			minlength: 8
		},
		confirmarPasswordReg: {
			equalTo: "#passwordReg"
		}
	},
	messages: {
		emailReg: {
			remote: "Usuario ya está registrado"
		}
	},
	submitHandler: function(form){
		$('#myModalRegistro').modal('hide');
		$('.loader').fadeIn('slow');
		$.post("includes/php.php",$('#formRegistro').serialize())
		.done(function(data){
			if(data==1){
				window.location.href="index.php?content=mi-cuenta";
			} else {
				alert("Se ha presentado un error procesando su registro. Por favor intente de nuevo.");
			}
		})
	}
});

// Cierre de sesión
function cerrarSesion(){
	$.post('includes/php.php',{
		consulta: "cerrarSesion"
	}).done(function(data){
		if(data==1){
			location.reload();
		} else {
			alert("Se presentó un problema. Por favor intente de nuevo.");
		}
	})
}

// Iniciar sesión
$('#formLogin').validate({
	rules: {
		emailLogin: {
			remote: {
				type: "POST",
				url: "includes/php.php",
				data: {
					consulta: "emailExiste"
				}
			}
		}
	},
	messages: {
		emailLogin: {
			remote: "Email no se encuentra registrado"
		}
	},
	submitHandler: function(form){
		$('#myModalLogin').modal('hide');
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#formLogin').serialize())
		.done(function(data){
		   if(data==1){
		       location.reload();
		   } else {
		       alert('Credenciales inválidas. Por favor intente de nuevo');
		       $('.loader').fadeOut('slow');
		       $('#myModalLogin').modal('show');
		   }
		})
	}
});

// Botón Recuperar Contraseña
$('#btnRecupera').click(function(){
	$('#myModalLogin').modal('hide');
	$('#myModalRecupera').modal('show');
})

// Formulario recuperar contraseña
$('#formRecupera').validate({
	rules: {
		emailRecupera: {
			remote: {
				type: "POST",
				url: "includes/php.php",
				data: {
					consulta: "emailExisteRecupera"
				}
			}
		}
	},
	messages: {
		emailRecupera: {
			remote: "Email no se encuentra registrado"
		}
	},
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#formRecupera').serialize())
		.done(function(data){
			$('#myModalRecupera').modal('hide');
			$('.loader').fadeOut();
			if(data==1){
				$('#myModalResponse').html('Hemos enviado un mensaje a su buzón de correo con un enlace para la recuperación de su contraseña');
				$('#myModalContent').modal('show');
			} else {
				$('#myModalResponse').html('Se ha presentado un error procesando su solicitud. Por favor intente de nuevo.');
				$('#myModalContent').modal('show');
			}
		})
	}
});

// Actualizar perfil del usuario
$('#formPerfil').validate({
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#formPerfil').serialize())
		.done(function(data){
			if(data==1){
				alert('Tu perfil ha sido actualizado exitosamente');
				location.reload();
			} else {
				alert(data);
				alert('Se ha presentado un error procesando tu solicitud. Por favor inténtalo de nuevo.');
				$('.loader').fadeOut();
			}
		})
	}
});

// Agregar educación
$('#formEducacion').validate({
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#formEducacion').serialize())
		.done(function(data){
			if(data==1){
				location.reload();
			} else {
				alert('Se ha presentado un error procesando la solicitud. Por favor intente nuevamente.');
				$('.loader').fadeOut();
			}
		})
	}
});

// Eliminar educación
$('.btnEliminaEducacion').click(function(){
	$('.loader').fadeIn();
	$.post('includes/php.php',{
		consulta: 'eliminaEducacion',
		registro: $(this).attr('registro')
	}).done(function(data){
		if(data == 1){
			location.reload();
		} else {
			alert('Se ha presentado un error procesando la solicitud. Por favor intente de nuevo.');
			$('.loader').fadeOut();
		}
	})
})

// Agregar experiencia laboral
$('#formExperiencia').validate({
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#formExperiencia').serialize())
		.done(function(data){
			if(data==1){
				location.reload();
			} else {
				alert('Se ha presentado un error procesando la solicitud. Por favor intente de nuevo.' + data);
				$('.loader').fadeOut();
			}
		})
	}
});

// Eliminar experiencia laboral
$('.eliminaExperiencia').click(function(){
	var x = confirm('¿Está seguro? Esta operación no podrá deshacerse');
	if(x==true){
		$('.loader').fadeIn();
		$.post('includes/php.php',{
			consulta: 'eliminaExperiencia',
			registro: $(this).attr('registro')
		}).done(function(data){
			if(data==1){
				location.reload();
			}
			if(data==0){
				alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
				$('.loader').fadeOut();
			}
		})
	}
})

// Agregar extracurriculares
$('#extracurriculares').validate({
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#extracurriculares').serialize())
		.done(function(data){
			if(data==0){
				alert('Lo sentimos. Se ha presentado un error. Por favor intente de nuevo.');
			}else{
				location.reload();
			}
		})
	}
})

// Elimina extracurriculares
$('.eliminaExtra').click(function(){
	var x = confirm('Esta operación no podrá deshacerse. ¿Desea continuar?');
	if(x==true){
		$('.loader').fadeIn();
		$.post('includes/php.php',{
			consulta: 'eliminaExtra',
			registro: $(this).attr('registro')
		}).done(function(data){
			if(data==0){
				alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
				$('.loader').fadeOut();
			}
			if(data==1){
				location.reload();
			}
		})
	}
})

// Agrega referencias
$('#referencias').validate({
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#referencias').serialize())
		.done(function(data){
			if(data==0){
				alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
			}else{
				location.reload();
			}
		})
	}
});

// Eliminar referencias
$('.eliminaReferencia').click(function(){
	$('.loader').fadeIn();
	$.post('includes/php.php',{
		consulta: "eliminaReferencia",
		registro: $(this).attr('registro')
	}).done(function(data){
		if(data==1){
			location.reload();
		}
		if(data==0){
			alert('Lo sentimos, se ha presentado un error. Por favor intente de nuevo.');
			$('.loader').fadeOut();
		}
	})
})

// Cambiar contraseña
$('#cambiarPassword').validate({
	rules: {
		newPassword: {
			minlength: 8
		},
		confirmPassword: {
			equalTo: "#newPassword"
		}
	},
	submitHandler: function(form){
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#cambiarPassword').serialize())
		.done(function(data){
			$('.form-control').val('');
			alert(data);
			$('.loader').fadeOut();
		})
	}
});

// Ofertas laborales
$('#ofertas').validate({
	submitHandler: function(form){
		var fechaPublicacion = new Date($('#fechaPublicacion').val());
		var fechaVencimiento = new Date($('#fechaVencimiento').val());
		var today = new Date();
		if( fechaPublicacion < today ){
			alert('La fecha de publicación debe ser posterior a la actual');
			return false;
		}
		if(fechaVencimiento <= fechaPublicacion){
			alert('La fecha de vencimiento debe ser posterior a la de publicación');
			return false;
		}
		$('.loader').fadeIn();
		$.post('includes/php.php',$('#ofertas').serialize())
		.done(function(data){
			if(data==1){
				location.reload();
			} else {
				alert(data);
				$('.loader').fadeOut();
			}
		})
	}
})

// Detalle de la oferta
$('.detalle-oferta').click(function(){
	cargar();
	$.post('includes/php.php',{
		consulta: "detalle-oferta",
		oferta: $(this).attr('oferta')
	}).done(function(data){
		modal(data);
	})
})

// Descargar la hoja de vida
$('.btn-download-cv').click(function(){
	cargar();
	$.post('includes/php.php',{
		consulta: 'descargaCV',
		candidato: $(this).attr('candidato')
	}).done(function(data){
		actualizaCreditos();
		descargar();
		modal(data);
	})
})