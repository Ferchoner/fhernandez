var isValid = false;		
// Validacion de campos, no pude acerlo  para todos los campos y esta
// validacion pobre para pocos campos(los mas faciles)

$(document).ready(function()
{
	$('form').submit( function() 
	{
		if 
		(	 
			$('#usuario').val() &&
			$('#apellidopat').val() &&
			$('#apellidomat').val() &&
			$("input[name ='sexo']:checked").val() &&
			$('#dia option:selected').text() != '' &&
			$('#mes option:selected').text() != '' &&
			$('#anio option:selected').text() != '' &&
			$('#email').val() &&
			$('#password').val() &&
			$('#physical_address').val() &&
			$('#foto').val() &&
			$('#estados option:selected').text() != '' &&
			$('#ciudades option:selected').text() != ''
		) 
		{
			isValid = true;
		}		
		
		
		if (!isValid) 
		{

			$('#error').html('Algunos campos que ingresaste estan vacios');	
			$('#error').css('color', 'red');
			$('#error').fadeIn();
			return false;
		}		
	});

	$("#estados").change(function()
	{
		// Codigo para activar el evento para que, una vez se seleccione un estado, 
		// se activen las ciudades pertinentes para cada estado
		var edo_id = $(this).val();
		if(edo_id != '')  
		{
			$.ajax
			({
			type: "POST",
			url: "getciudades.php",
			data: "edo_id="+ edo_id,
			success: function(option)
			{
			$("#ciudades").html(option);
			}
			});
		}
		else
		{
			$("#ciudades").html("<option value=''></option><option value=''>ciudad</option>");
		}
		return false;
	});
});