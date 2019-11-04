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
    <style>

    </style>
</head>
<body>
    <section class="container-fluid">
        <section class="row">
            <h1>Seleccione el paquete para la cena</h1>
            <div class="col-md-d">
                <h4>Basico</h4>
                <img src="img/jodido.png" alt="platillo1">
                <h4>$100</h4>  
            </div>
            <div class="col-md-d">
                <h4>Medio</h4>
                <img src="img/medio.png" alt="platillo2">
                <h4>$500</h4>
                </div>
            <div class="col-md-d">
                <h4>Premiun</h4>
                <img src="img/plus.png" alt="platillo3">
                <h4><$1000/h4>
            </div>
            <div class="col-md-d">
                <h4></h4>
            
                <h4></h4>
            </div>
        </section>
    </section>
</body>
</html>
