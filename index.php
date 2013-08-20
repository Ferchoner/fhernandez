<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<script src="js/jquery.min.js"></script>
	<script src="js/index.js"></script>
	<link rel="stylesheet" href="css/style.css"/>
	<title>Usuarios</title>
</head>
<body>
	<h1>Bienvenido</h1>
	<label id="error"></label> 
	<form action="javascript:validarUsuario()">
		<label>Usuario:</label> 
		<input type="text" id="usuario" name="usuario"></input><br>
		<label>Password:</label>
		<input type="password" id="password" name="pass"></input><br>
		<input type="submit" value="Aceptar">
	</form>
	<br>
	<a href="password.php">Olvide mi password</a>
	<br><br>
	No estas registrado aun?, registrate ahora dando click <a href="registro.php">aqui</a>
</body>
</html>