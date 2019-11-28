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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href="invitacion.html"><img src="img/índice.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="login.php">Iniciar sesion<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="registro.php">Registrar</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                  </form>
                </div>
              </nav>

<section class="container" id="Info">
                    <div class="jumbotron">
                    
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
                    
                                
                    </div>
                         
</section>
    
    
</body>
</html>