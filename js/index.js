var isValid = false;
var array = new Array();
function validarUsuario(){
	
	if ($('#usuario').val() != '' && 
		$('#password').val() != ''
		) {
			isValid = true;
	};

	if (isValid) {
		// manda a Guardar si todo esta 'bien'
		$.ajax
				({
				type: "POST",
				url: "validarusuario.php",
				data: "credentials=" + $('#usuario').val() + "," + $('#password').val(), 
				success: function(option)
				{
					if(option == "true"){
						window.location.href='usuariopanel.php'
					}
					else {
						//error en caso de que no se consigan los datos del usuario de la base de datos
						$('#error').html('Algunos campos que ingresaste son incorrectos');
						$('#error').fadeIn('slow');
						return false;
					}
				}
			});
	}
	else{
		// Muestra el error si no estan completos los campos
		$('#error').html('Dejaste campos vacios, tienes que llenar todos los campos');
		$('#error').fadeIn('slow');
		return false;
	}
	return false;
};

$( "Document" ).ready( function(){

	$("#usuario").change( function(){
		$('#error').fadeOut('slow');
	});

	$("#password").change( function(){
		$('#error').fadeOut('slow');
	});
});