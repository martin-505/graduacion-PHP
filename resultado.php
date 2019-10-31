
    <?php
        include("conexion.php");
        $usuario=$_POST["usuario"];
        $contrasenia = hash("whirlpool",$_POST["contrasenia"]);

        $statement = "SELECT contrasenia
                        FROM usuarios
                        WHERE contrasenia ='$contrasenia'
                        AND nombre = '$usuario'";
        $resultado = $conexionBD->query($statement);
        if($resultado->num_rows>0)
        {
            session_start();
            $_SESSION["usuario"]=$usuario;
           $datos=
           [
                "mensaje" => "<h1 class=\"text-success\">Bienvenid@".$usuario."</h1>",
                "codigo" => "1"
           ];
            
        }
        else
        {
            $datos=
           [
                "mensaje" => "<h1 class=\"text-danger\">Ususario o contraseña incorrecta!</h1>",
                "codigo" => "0"
           ];
            
            
        }
        echo json_encode($datos);
        
    ?>
 