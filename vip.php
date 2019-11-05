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
            $("#modalConfirmar").modal("show");
        });

    });
    </script>
    <style>
        img{
            width: 50%;
        }
    </style>
</head>
<body>
    <section class="container-fluid">
        <section class="row">
            <div class="col-md-12">
                <h1>Seleccione el paquete para la cena</h1>
            </div>
            <div class="col-md-d">
                <h4>Basico</h4>
                <img src="img/jodido.png" alt="platillo1">
                <input type="number" id="paquete1" value="0" min="0" max="10">
                <h4 data-precio="100">$100</h4>  
            </div>
            <div class="col-md-d">
                <h4>Medio</h4>
                <img src="img/medio.png" alt="platillo2">
                <input type="number" id="paquete2" value="0" min="0" max="10">
                <h4 data-precio="500">$500</h4>
                </div>
            <div class="col-md-d">
                <h4>Premiun</h4>
                <img src="img/plus.png" alt="platillo3">
                <input type="number" id="paquete3" value="0" min="0" max="10">
                <h4 data-precio="1000">$1000<h4>
            </div>
            <div class="col-md-12">
                <button id="btnConfirmar" class="btn btn-primary">
                    Confirmar
                </button>
            </div>
        </section>
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
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
