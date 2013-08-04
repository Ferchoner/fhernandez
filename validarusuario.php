<?php
  session_start();
  $db = mysqli_connect('127.0.0.1', 'root' , 'test123', 'h_usuarios' );
  // Codigo para validar que el usuario existe en la base de datos,
  // y si existe imprime true y guarda la informacion obtenida en session para 
  // mostrarla en la pagina siguiente
  $array = explode(',', $_POST['credentials']);
  $query = "SELECT * FROM usuarios WHERE email = '{$array[0]}' AND password = '{$array[1]}';";
  $res =  mysqli_query( $db, $query);
  if($res)
  {
    while($row = mysqli_fetch_array($res))
    { 
      foreach ($row as $key => $value) {
        $_SESSION[$key] = $value;
      }
      echo "true";
    }
  }
  else{
    echo 'false';
  }
?>