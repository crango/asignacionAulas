<!doctype html>
<html>

<head>
    <meta charset="utf-8">
</head>
<script>
function enviar2(destino){
 document.formulario.action=destino;
  document.formulario.submit();
 }
</script>
<?php 

    $db_host="localhost";
    $db_nombre="asignacionaulas";
    $db_usuario="root";
    $db_contrasenia="";
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia,$db_nombre);
    if(mysqli_connect_errno()){
        echo '<script language="javascript">alert("fallo al conectar con la base de datos");</scrip>';
        exit();
    }
    mysqli_set_charset($conexion, "utf8");

    $consulta="SELECT * FROM `solicitud`";

    $resultado_consulta=mysqli_query($conexion,$consulta);

    $count=0;
            echo "<table><tr><td><label>codigo</label></td>";
            echo "<td><label>nombre</label></td>";
            echo "<td><label>correo</label></td></tr></table><br>";
    while(($fila=mysqli_fetch_row($resultado_consulta))==true){

        echo "<form action='AsignacionDeAulas.php'  method='get'>";
            echo "<table><tr><td><label>" .$fila[0]. "</label>";
            echo "<td><label>" .$fila[1]. "</label></td>";
            echo "<td><label>" .$fila[2]. "</label></td>";
            echo "<td><label>" .$fila[3]. "</label></td>";
            echo "<td><label>" .$fila[4]. "</label></td>";
            echo "<td><label>" .$fila[5]. "</label></td>";
            echo "<td><label>" .$fila[6]. "</label></td>";
            echo "<input type='hidden' id='fila' name='id_solicitud' value='". $fila[0] ."'>";
            echo "<input type='hidden' id='fila' name='fecha_solicitud' value='". $fila[1] ."'>";
            echo "<input type='hidden' id='fila' name='fecha_reserva' value='". $fila[2] ."'>";
            echo "<input type='hidden' id='fila' name='cantidad_estudiantes' value='". $fila[3] ."'>";
            echo "<input type='hidden' id='fila' name='detalle' value='". $fila[4] ."'>";
            echo "<input type='hidden' id='fila' name='id_periodo' value='". $fila[5] ."'>";
            echo "<input type='hidden' id='fila' name='id_docente_materia' value='". $fila[6] ."'>";
            echo "<td><input type='submit'  name='aceptar' value='aceptar'></td><br>";
        echo "</form>";
    echo "<form action='formulario_Rechazar.php'  method='get'>";
            echo "<input type='hidden' id='fila' name='id_solicitud2' value='". $fila[0] ."'>";
            echo "<input type='hidden' id='fila' name='fecha_solicitud2' value='". $fila[1] ."'>";
            echo "<input type='hidden' id='fila' name='fecha_reserva2' value='". $fila[2] ."'>";
            echo "<input type='hidden' id='fila' name='cantidad_estudiantes2' value='". $fila[3] ."'>";
            echo "<input type='hidden' id='fila' name='detalle2' value='". $fila[4] ."'>";
            echo "<input type='hidden' id='fila' name='id_periodo2' value='". $fila[5] ."'>";
            echo "<input type='hidden' id='fila' name='id_docente_materia2' value='". $fila[6] ."'>";
            echo "<td><input type='submit'  name='aceptar2' value='Rechazar'></td><br>";
        echo "</form>";
    }
    mysqli_close($conexion);
?>
</html>