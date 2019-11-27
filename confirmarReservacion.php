<?php
session_start();
include("conexion.php");


$idUsuario = $_SESSION["datosUsuario"]["id"];
$idSilla = $_POST["silla"];
$sql = "SELECT * FROM usuarios_paquete";

$paquete = $conexionBD->query($sql);

if(mysqli_num_rows($paquete)>0){
    $fila = $paquete->fetch_array(MYSQLI_ASSOC);
    $_SESSION["Usuario"] = $fila["idUsuario"];
    $_SESSION["Paquete"] = $fila["paquete"];
    $_SESSION["Lugares"] = $fila["lugares"];

}else{
    echo "No hay resultados";
}

$paquete1 = $_SESSION["Paquete"];

$statement = "INSERT INTO reservacion (id_silla, id_usuario, paquete) 
                VALUES ('$idSilla','$idUsuario','$paquete1')";

$resultado = $conexionBD->query($statement);

if($resultado){
    echo "Registro exitoso";
}else{
    echo "Error de registro equisde";
}

?>