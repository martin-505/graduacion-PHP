<?php 
session_start();
$sesion=$_SESSION["usuario"];
if (!isset($sesion)){
    // echo "esta seccion es para puros compas";
    // var_dump($_SESSION["datosUsuario"]);
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIP</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
    $(function(){
        $paquetes = $("#paquete1, #paquete2, #paquete3");
        $paquetes.on("change",function(){
            var numero = $(this).val();
            var $precioCaja = $(this).next("h4");
            var precio = "$" + ($precioCaja.attr("data-precio")*numero);

            $precioCaja.text(precio);
        });

        $("#modalConfirmar").modal({
            show: false
        });

        $("#btnConfirmar").on("click",function()
        {
            var total = 0;
            $("#modalConfirmar").modal("show");
            $paquetes.each(function(){
                var nummero = $(this).val();
                var $precioCaja = $(this).next("h4");
                var precio = ($precioCaja.attr("data-precio")*nummero);

                total = total + parseInt(precio);
            });
            $("#precioFinal").text("El total es: $" + total );
        });

        $("#btnAceptar").on("click",function()
        {
            $(this).prop("disabled",true);
            var lugaresPaquete1 = $("#paquete1").val();
            var lugaresPaquete2 = $("#paquete2").val();
            var lugaresPaquete3 = $("#paquete3").val();
            $.ajax({
            url: "comprar.php",
            method: "POST",
            data:{
                paquete1: lugaresPaquete1,
                paquete2: lugaresPaquete2,
                paquete3: lugaresPaquete3
            }
        })
        .done(function(){
            $(this).prop("disabled",false);
            $("#modalConfirmar").modal("hide");
            window.location.href = "vip.php"
        });

        });

        $.ajax({
            url: "indicadores.php",
            method: "GET",
            dataType: "json"
        }).done(function(indicadores){
            console.log(indicadores);
            $("#indicador1 p").text(indicadores[0].lugares);
            $("#indicador2 p").text(indicadores[1].lugares);
            $("#indicador3 p").text(indicadores[2].lugares);
        });
     
    });
    </script>
    <style>
        img{
            width: 50%;
        }
        aside.indicadores
        {
            text-align: center;
            position: fixed;
            top: 70px;
            left: 0;
        }
        aside.indicadores img 
        {
            width: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href="invitacion.html"><img src="img/índice.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                      <a class="nav-link" href="reservaciones.php">Reserevar tus lugares</a>
                    </li>
                  </ul>
                </div>
</nav>

<section class="container" id="Info">
                    <div class="jumbotron">
                    <section class="container-fluid">
        <section class="row text-center">
            <div class="col-md-12">
                <h1>Seleccione el paquete para la cena</h1>
            </div>
            <div class="col-md-4">
                <h4>Basico</h4>
                <img src="img/jodido.png" alt="platillo1">
                <input type="number" id="paquete1" value="0" min="0" max="10">
                <h4 data-precio="100">$0</h4>  
            </div>
            <div class="col-md-4">
                <h4>Medio</h4>
                <img src="img/medio.png" alt="platillo2">
                <input type="number" id="paquete2" value="0" min="0" max="10">
                <h4 data-precio="500">$0</h4>
                </div>
            <div class="col-md-4">
                <h4>Premiun</h4>
                <img src="img/plus.png" alt="platillo3">
                <input type="number" id="paquete3" value="0" min="0" max="10">
                <h4 data-precio="1000">$0<h4>
            </div>
            <div class="col-md-12">
                <button id="btnConfirmar" class="btn btn-primary">
                    Confirmar
                </button>
            </div>
        </section>
    </section>

                    
                    
                                
                    </div>
                         
</section>
    
    <div class="modal" tabindex="-1" role="dialog" id="modalConfirmar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea confirmar su compra?</p>
        <p id="precioFinal"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnAceptar">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<aside class="indicadores">
        <div id="indicador1">            
            <img src="img/jodido.png" alt="paquete1">
            <p class="badge badge-danger">0</p>
        </div>
        <div id="indicador2">
            <img src="img/medio.png" alt="paquete2">
            <p class="badge badge-danger">0</p>
        </div>
        <div id="indicador3">
            <img src="img/plus.png" alt="paquete3">
            <p class="badge badge-danger">0</p>
        </div>
</aside>
</body>
</html>
