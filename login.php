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
    <script src="js/jquery-3.4.1.main.js"></script>
    <script>
        $(function(){
            $boton = $("button";
            $boton.on("click",function(evento){
                evento.preventDefault();
                var usuario = $('[name]="usuario"');

                $.ajax({

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

                </form>
            </div>
        </section>
    </section>
    
</body>
</html>