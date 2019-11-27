<?php
    session_start();

    include("conexion.php");

    if($_POST["paquete1"]>0)
    {
        $idUsuario =$_SESSION["datosUsuario"]["id"];
        $lugares = $_POST["paquete1"];

        $statementVerificarDuplicado= "SELECT FROM usuarios_paquete
                                        WHERE idUsuario=$idUsuario
                                        And paquete= 1";

        $resultadoVerificarDuplicado = $conexionBD->query($statementVerificarDuplicado);
        $duplicados =$resultadoVerificarDuplicado->num_rows;
        if($duplicados==0)
        {
            $statement = 
            "INSERT INTO usuarios_paquete
            (idUsuario, paquete, lugares)
            VALUES
            ($idUsuario, 1, $lugares)
            ";
            $resultado = $conexionBD->query($statement);
            echo "resultado de paquete1: ".$resultado. "";
        }
       
    }
    if($_POST["paquete2"]>0)
    {
        $idUsuario =$_SESSION["datosUsuario"]["id"];
        $lugares = $_POST["paquete2"];

        $statementVerificarDuplicado= "SELECT FROM usuarios_paquete
                                        WHERE idUsuario=$idUsuario
                                        And paquete= 2";

        $resultadoVerificarDuplicado = $conexionBD->query($statementVerificarDuplicado);
        $duplicados =$resultadoVerificarDuplicado->num_rows;
        if($duplicados==0)
        {
            $statement = 
            "INSERT INTO usuarios_paquete
            (idUsuario, paquete, lugares)
            VALUES
            ($idUsuario, 2, $lugares)
            ";
            $resultado = $conexionBD->query($statement);
            echo "resultado de paquete2: ".$resultado. "";
        }
    }
    if($_POST["paquete3"]>0)
    {
        $idUsuario =$_SESSION["datosUsuario"]["id"];
        $lugares = $_POST["paquete3"];

        $statementVerificarDuplicado= "SELECT FROM usuarios_paquete
                                        WHERE idUsuario=$idUsuario
                                        And paquete= 3";

        $resultadoVerificarDuplicado = $conexionBD->query($statementVerificarDuplicado);
        $duplicados =$resultadoVerificarDuplicado->num_rows;
        if($duplicados==0)
        {
            $statement = 
            "INSERT INTO usuarios_paquete
            (idUsuario, paquete, lugares)
            VALUES
            ($idUsuario, 3, $lugares)
            ";
            $resultado = $conexionBD->query($statement);
            echo "resultado de paquete3: ".$resultado. "";
        }
    }

    echo "<p>Lugares comprados</p>";

    echo "<p>" . $_POST["paquete1"] . "</P>";
    echo "<p>" . $_POST["paquete2"] . "</P>";
    echo "<p>" . $_POST["paquete3"] . "</P>";

    echo '<p>Usuaro que hizo la operacion</p>';
    echo '<p>'.$_SESSION["datosUsuario"]["id"].'</p>'
?>