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
        <div class="padre">
            <div class="hijo1"><img src="" alt=""></div>
            <div class="hijo2"></div>
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

        $(function() {
            $('[data-toogle="tooltip"]').tooltip();
            $("#ventanaConfirmacion").modal({show:false});

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
