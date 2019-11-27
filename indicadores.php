<?php
    session_start();
    $idUsuario =$_SESSION["datosUsuario"]["id"];

    include("conexion.php");
    $statement ="SELECT idUsuario, paquete, lugares
                    FROM usuarios_paquete
                    WHERE idUsuario = $idUsuario";
    $resultado = $conexionBD->query($statement);

    $compras = array();
    while($fila = mysqli_fetch_assoc($resultado))
    {
        $compras[] = $fila;
    }
    echo json_encode($compras);
    
?>