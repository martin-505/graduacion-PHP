<?php
session_start();
$idUsuario = $_SESSION["datosUsuario"]["id"];

include("conexion.php");
$mesas = "";

$plantillaMesa = file_get_contents("templates/mesa.html");
$plantillaSilla = file_get_contents("templates/silla.html");

$statementMesas = "SELECT Id, N_Mesa
                   FROM mesas";
$resultadoMesas = $conexionBD->query($statementMesas);

foreach($resultadoMesas as $fila){
    $sillas = "";
    $idMesa = $fila["Id"];

    $statementSillas = "SELECT S.ID, S.posicion, R.paquete, U.Nombre
                        FROM sillas S
                        LEFT JOIN reservacion R ON R.id_Silla = S.ID
                        LEFT JOIN usuarios U ON U.ID = R.id_usuario
                        WHERE id_mesa = $idMesa";
    $resultadoSillas = $conexionBD->query($statementSillas);

    foreach($resultadoSillas as $fila){
        $idSilla = $fila["ID"];
        $nombre = $fila["Nombre"];

        $posicion = $fila["posicion"];
        $reservada = $fila["paquete"] ? "silla-reservada" : "";
        $mensaje = $nombre ? "title=\"Esta silla ya la tiene $nombre!\"" : "";

        $sillas .=  sprintf($plantillaSilla, $posicion, $reservada, $mensaje, $idSilla);
    }
    $mesas .= sprintf($plantillaMesa, $idMesa, $sillas);
}
?>