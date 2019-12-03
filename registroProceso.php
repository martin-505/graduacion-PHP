<?php
    include("conexion.php");
    $usuario=$_POST["usuario"];
    $contrasenia = hash("whirlpool",$_POST["contrasenia"]);
    $email = $_POST["email"];


    $statement = "INSERT INTO usuarios(nombre,contrasenia,email)
                    VALUES('$usuario', '$contrasenia', '$email')";

        #echo $statement;
        $resultado = $conexionBD->query($statement);
        if($resultado)
        {
            echo'<script languaje = "javascript">';
            echo 'window.location.href = "login.php"';
            echo'</script>';
        }
        else
        {
            echo "el registro no se registro";
        }

?>