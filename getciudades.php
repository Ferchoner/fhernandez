<?php
$db = mysqli_connect('127.0.0.1', 'root' , 'test123', 'h_usuarios' );
// Codigo para obtener las ciudades elegibles una vez que se eligio un estado
// se obtiene el codigo html que se pondra en el select box
if( !empty($_POST['edo_id']) )
{

  $edo_id = $_POST['edo_id'];
  $query = "select * from ciudades where id_estado = '".$edo_id."'";
  $res =  mysqli_query( $db, $query);
  if($res)
  {
    echo '<option></option>';
    while($row = mysqli_fetch_array($res))
    {
      echo '<option value="' . $row['id_ciudad'] . '">' . $row['nombre_ciudad'] . '</option>';
    }
  }
}
?>