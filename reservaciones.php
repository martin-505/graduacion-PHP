<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservaciones</title>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/all.min.css"/>
    <style>
        body{
            display: grid;

        }

        .padre{
            background-color:transparent;
            border: 0px solid black;
            padding: 0 1rem;
            margin: 1rem;
            height: 150px;
            display: flex;
        }

        .hijo2{
            background-color: #9DBBAE;
            width: 200px;
            height: 147px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            color: white;
            justify-content: center;
        }

        .hijo1{
            background-color: #9DBBAE;
            width: 650px;
            height: 147px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            color: white;
            justify-content: center;

        }

        img{
            height: 105px;
            width: 134px;
        }
        .salon{
            margin: 40px;
        }
        .silla-reservada{
            color: red;
        }
        .contenedor-mesa{
            margin: 5px;
            width: 150px;
            height: 150px;
            position: relative;
            display: inline-block;
        }
        .mesa{
            font-size: 6em;
        }
        .silla{
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }

        .silla-pos1{
            top: -25px;
            left: 18px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos2{
            top: -25px;
            left: 56px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos3{
            top: 15px;
            left: 94px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos4{
            top: 56px;
            left: 94px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos5{
            top: 96px;
            left: 56px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos6{
            top: 96px;
            left: 18px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos7{
            top: 15px;
            left: -20px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
        .silla-pos8{
            top: 56px;
            left: -20px;
            font-size: 1.5em;
            position: absolute;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="salon">
        <?php
            include ("procesarplantillas.php");
            echo $mesas;
        ?>
        <?php
                // session_start();
                // include("conexion.php");

                $consulta2="SELECT * FROM reservacion";
                $resultado_= $conexionBD->query($consulta2);
                $filas2=$resultado_->num_rows;
                $usuarios_= array();
                while($fila1=$resultado_->fetch_assoc())
                {
                    $usuarios_[]=$fila1;
                }
                    echo("Solo ".$filas2." lugares fueron apartados");
                
                    $user = "root"; 
                    $password = "admin123";
                    $host = "localhost";
                    $database= "graduacion_4b";
                    
                    $connection= mysql_connect ($host, $user, $password);
                    if (!$connection)
                    {
                    die ('Could not connect:' . mysql_error());
                    }
                    mysql_select_db($database, $connection);
                    
                    $idUsuario = $_SESSION["datosUsuario"]["id"];
                    
                    $result = mysql_query("SELECT (SELECT SUM(lugares) FROM usuarios_paquete WHERE idUsuario =$idUsuario)
                            -(SELECT SUM(paquete) FROM reservacion where id_usuario = $idUsuario) AS totalsum FROM DUAL");
                    
                    $row = mysql_fetch_assoc($result); 
                    
                    $sum = $row['totalsum'];
                    if($filas2>0){

                        if($sum>0){

                            echo("<h1>Solo a seleccionado ".$filas2." lugares.</h1>");
                            echo ("<h1>Solo le quedan ".$sum." lugares disponibles para reservar.</h1>");
                            }
                            else if(!$sum>=0){
                                echo'<script languaje = "javascript">';
                                echo 'window.location.href = "reservacciones.php"';
                                echo'</script>';
                            }
                    }else{
                        echo("<h1>Seleccione una silla para continuar.</h1>");
                    }
        ?>
        <?php
                $numero=140-$filas2;
                echo("Quedan ".$numero." de 140 sillas disponibles!");
        ?>

        <div class="padre">
            <div class="hijo1">Pista<img src="img/bailongo.png" alt=""></div>
            <div class="hijo2">Mesa de Dulces<img src="img/dulces.png" alt=""></div>
        </div>
    </section>
    
    <div class="modal" id="ventanaConfirmacion"tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar reservacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Confirmar reservacion?</p>
        <div class="col-md-4">
                <h4>Basico</h4>
                <a href="#"><img src="img/jodido.png" alt="platillo1" id="numero1"></a>
            </div>
            <div class="col-md-4">
                <h4>Medio</h4>
                <a href="#"><img src="img/medio.png" alt="platillo2" id="numero2"></a> 
            </div>
            <div class="col-md-4">
                <h4>Premium</h4>
                <a href="#"><img src="img/plus.png" alt="platillo3" id="numero3"></a>
            </div>
      </div>
    </div>
</div>

    <div class="modal" id="ventanaConfirmacion"tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar reservacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Confirmar reservacion?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnAceptar">Aceptar</button>
      </div>
    </div>
  </div>
</div>
    <script>

        var idSilla = 0;
        var paquete1 = 1;
        var paquete2 = 2;
        var paquete3 = 3;
        $(function() {
 
            $('[data-toogle="tooltip"]').tooltip();
            $("#ventanaConfirmacion").modal({show:false});

            $("#numero1").on("click", function(){
                $.ajax({
                    url: "confirmarReservacion.php",
                    method: "POST",
                    data:{
                        silla:idSilla,
                        paquete:paquete1
                    }
                })
                .done(function(){
                    $("#ventanaConfirmacion").modal("hide");
                    window.location.href = "reservaciones.php";
                });
            });

            $("#numero2").on("click", function(){
                $.ajax({
                    url: "confirmarReservacion.php",
                    method: "POST",
                    data:{
                        silla:idSilla,
                        paquete:paquete2
                    }
                })
                .done(function(){
                    $("#ventanaConfirmacion").modal("hide");
                    window.location.href = "reservaciones.php";
                });
            });

            $("#numero3").on("click", function(){
                $.ajax({
                    url: "confirmarReservacion.php",
                    method: "POST",
                    data:{
                        silla:idSilla,
                        paquete:paquete3
                    }
                })
                .done(function(){
                    $("#ventanaConfirmacion").modal("hide");
                    window.location.href = "reservaciones.php";
                });
            });

            $(".silla").on("click", function(){
                var reservada = $(this).hasClass("silla-reservada");

                if(!reservada){
                    idSilla = $(this).attr("data-id");
                    $("#ventanaConfirmacion").modal("show");
                }else{

                }
            });

            $("#btnCancelar").on("click", function(){
                $("#ventanaConfirmacion").modal("hide");
            });

            $("#btnAceptar").on("click", function(){
                

                $.ajax({
                    url: "confirmarReservacion.php",
                    method: "POST",
                    data:{
                        silla:idSilla
                    }
                })
                .done(function(){
                    $("#ventanaConfirmacion").modal("hide");
                    window.location.href = "reservaciones.php";
                });
            });
        });
    </script>  
</body>
</html>
