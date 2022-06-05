<?php
include_once("../conexiones/conexion.php");

//$_POST["fecha"] = date("Y-m-d");
//$id_docente = 1;

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$username = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT * FROM docentes WHERE usuario='{$username}' AND password = '{$password}'";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$usuario = $resultado->fetchAll(PDO::FETCH_ASSOC);

if (!empty($usuario)) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["id_docente"] = $usuario[0]["id_docente"];
    $_SESSION["ci_docente"] = $usuario[0]["ci_docente"];
    $_SESSION["nombre_docente"] = $usuario[0]["nombre_docente"];
    $_SESSION["correo"] = $usuario[0]["correo"];
    $_SESSION["usuario"] = $usuario[0]["usuario"];
    $_SESSION["password"] = $usuario[0]["password"];
    $_SESSION["is_admin"] = $usuario[0]["is_admin"];

    if ($_SESSION["is_admin"] == 1) {
        echo "<script> alert('Bienvenido Administrador'); </script>";
        header("Location: /vista/homeAdministrativo.php");
    } else {
        echo "<script> alert('Bienvenido Docente'); </script>";
        header("Location: /vista/homeDocente.php");
    }
} else {
    header("Location: ../login.php");
}
