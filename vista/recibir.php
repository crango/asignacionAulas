<?php
$texto=$_POST['experiencia'];
$docente=$_POST['prueba'];
$materia=$_POST['materia'];
$grupo=$_POST['grupo'];
$fecha='2022-04-08';
date_default_timezone_set('America/Mexico_City');
$fecha_Actual=date("Y-m-d");
  $db_host="localhost";
  $db_nombre="prueba";
  $db_usuario="root";
  $db_contra="";
  $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
  $Id=mysqli_insert_id($conexion);
  $insertar2="INSERT INTO `rechazados` (`Id`, `Doecente`, `Fecha`, `Materia`, `Motivo_Rechazo`) VALUES (NULL, '$docente', '2022-04-13', '$materia', '$texto')";
  
  $consulta=mysqli_query($conexion,$insertar2);
  if($consulta){
      echo "<div  style='background:green;color:white; text-align: center;font-family:Verdana, sans-serif;'>
      <h1 >  SE ENVIO CORRECTAMENTE EL FORMULARIO  </h1>
      <h1>     </h1>
      </div>";
  }
 else{
     echo "
     <div>
     <h1   style='background:red; color:white; text-align: center;font-family:Verdana, sans-serif;'; > NO SE ENVIO CORRECTAMENTE EL FORMULARIO   
     </div>  </h1>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificacion de Envio</title>
</head>
<body>     
         <a href="recolectarDatos.php">    <img src="atras.png" width="70" height="70"  alt=""  style="position:absolute; top: 20%; left: 10%;"> </a>
</body>
</html>