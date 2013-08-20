<!DOCTYPE html>
<?php 
	session_start();
	if(empty($_SESSION['nombre_usuario'])){
		header("Location: http://localhost/fhernandez");
		die();
	}
?>
<html>
<head>
	<script src="jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css"/>
	<title>Panel de Informacion de Usuario</title>
</head>
<body>
	<h1>
		<?php echo $_SESSION['sexo'] == 'M' ? Bienvenido : Bienvenida; ?> 
		<a href="modificar.php">
			<?php echo $_SESSION['nombre_usuario'] . ' ' . $_SESSION['apellido_paterno'] . ' ' . $_SESSION['apellido_materno'];?>
		</a>
		<br>
		<a href="modificar.php">
			<img src="img/<?php echo $_SESSION['fotografia'];?>"></img>
		</a>
		<br>
		<br>
		<a href="logout.php">logout</a>
	</h1>
</body>
</html>
