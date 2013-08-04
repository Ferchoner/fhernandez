<?php
  $db = mysqli_connect('127.0.0.1', 'root' , 'test123', 'h_usuarios' );
  
  // Codigo para la insercion de un nuevo usuario
  // Todavia en duda como hacerle para obtener la informacion del usuario...
$query = <<<EOT
INSERT INTO usuarios (nombre_usuario, apellido_paterno, apellido_materno, sexo, DOB, email, password, direccion, fotografia, estado, ciudad) 
VALUES
( '{$_POST['usuario']}', 
  '{$_POST['apellido_pat']}', 
  '{$_POST['apellido_mat']}', 
  '{$_POST['sexo']}', 
  '{$_POST['anio']}-{$_POST['mes']}-{$_POST['dia']}', 
  '{$_POST['email']}', 
  '{$_POST['password']}', 
  '{$_POST['physical_address']}', 
  '{$_FILES["file"]["name"]}', 
  '{$_POST['estado']}', 
  '{$_POST['ciudad']}'
);
EOT;

  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);
  if ( 
      (($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 2000000)
      && in_array($extension, $allowedExts)
      && !file_exists("upload/" . $_FILES["file"]["name"])
  )
  {
    $res =  mysqli_query( $db, $query);
    if ($res) {  
      move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $_FILES["file"]["name"] );
      header("Location: http://localhost/fhernandez");
      die();
    }
  }
  else
  {
    header("Location: http://localhost/fhernandez/registro.php");
    die();
  }
?>