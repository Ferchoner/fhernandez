<!DOCTYPE html>
<html>
<head>
	<script src="jquery.min.js"></script>
	<script type="text/javascript" src="registro.js"></script>
	<title>Registro de Usuario</title>	
</head>

<?php
	// Conexion a la base de datos para conseguir todos los estados
	$db = mysqli_connect('127.0.0.1', 'root' , 'test123', 'h_usuarios' );
	
	$estados = mysqli_query($db ,"SELECT * FROM estados");

	if( is_string($estados) ){
		echo 'No se pudieron obtener los estados y/o ciudades :(';
	}

?>
<body>	
	<h1>Pagina de Registro</h1>
	<label id="error" style:"color:red;"></label> 
	<form action="guardarusuario.php" enctype="multipart/form-data" method="POST">
		<label>Nombre:</label> 
		<input type="text" id="usuario" name="usuario"></input><br>
		<label>Apellido Paterno:</label>
		<input type="text" id="apellidopat" name="apellido_pat"></input><br>
		<label>Apellido Materno:</label> 
		<input type="text" id="apellidomat" name="apellido_mat"></input><br>
		<label>Sexo:</label><br>
		<input type="radio" id="male" name="sexo" value="M">Masculino
		<input type="radio" id="female"name="sexo" value="F">Femenino<br>
		<label>Fecha de Nacimiento</label><br>
		<label>Dia:</label> 
		<select id="dia" name="dia">
			<option></option>
			<?php
				for ($i=1; $i < 32; $i++) { 
					echo '<option value="' . $i . '">'. $i . '</option>';
				}
			?>
		</select>
		<label>Mes:</label> 
		<select id="mes" name="mes">
			<option></option>
			<?php
				for ($i=1; $i < 13; $i++) { 
					echo '<option value="' . $i . '">'. $i . '</option>';
				}
			?>
		</select>
		<label>A&ntilde;o:</label> 
		<select id="anio" name="anio">
			<option></option>
			<?php
				for ($i=2013; $i >= 1900; $i--) { 
					echo '<option value="' . $i . '">'. $i . '</option>';
				}
			?>
		</select><br>
		<label>Correo Electronico:</label> 
		<input type="email" id="email" name="email"></input><br>
		<label>Contrase&ntilde;a:</label> 
		<input type="password" id="password" name="password"></input><br>
		<label>Direccion:</label>
		<input type="text" id="physical_address" name="physical_address"></input><br>
		<label>Fotografia:</label>
		<input type="file" id="foto" name="file"></input><br>
		<label>Estado:</label>
		<select id="estados" name="estados">
			<option></option>
			<?php
			// listado de estados de la Base de datos
			while($row = mysqli_fetch_array($estados))
			{
				echo '<option value="' . $row['id_estado'] . '">'. $row['nombre_estado'] . '</option>';
			}
			?>
		</select><br>
		<label>Ciudad:</label>
		<select id="ciudades" name="ciudades">
			<!-- Listado de ciudades vacio hasta que se seleccione un estado-->
			<option></option>
			<option>Ciudad</option>
		</select><br>
		<a href="/fhernandez">Atras</a>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>