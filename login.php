<?php
    session_start();
    session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <script src="js/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
            $boton = $("button");
            $spin = $(".fa-spin");
            $boton.on("click",function(evento){
                evento.preventDefault();   
                $boton.prop("disabled",true);
                $spin.fadeIn();
                var usuario = $('[name = "usuario"]').val();
                var contrasenia = $('[name = "contrasenia"]').val();

                $.ajax({
                    url:"resultado.php",
                    //dataType: "json",
                    method: "POST",
                    data:
                    {
                        usuario: usuario,
                        contrasenia: contrasenia
                    }
                })
                .done(function(informacion)
                {
                    var json = JSON.parse(informacion);
                    console.log(json);
                    $boton.prop("disabled",false);
                    $spin.fadeOut();
                    if(json.codigo == "0")
                    {
                        $("#mensaje").html(json.mensaje);
                    }
                    else if(json.codigo == "1")                   
                    {
                        window.location.href = "vip.php";
                    }
                    //$("#mensaje").html(informacion);
                });
            });
        });
    </script>
    <style>
        .fa-spin
        {
            display:none;
        }
    </style>
</head>
<body>
    <section class="container">
        <section class="row">
            <div class="col-md-6">
                <form action="resultado.php" method="POST">
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" name = "usuario">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="contrasenia">
                    </div>
                    <button class="btn btn-primary">Envia datos</button>

                    <i class="fas fa-cog fa-spin"></i>
                    <div id="mensaje">

                    </div>

                </form>
            </div>
        </section>
    </section>
    
</body>
</html>