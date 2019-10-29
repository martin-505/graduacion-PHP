<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Registro</title>
</head>
<body>
    <section class="rom">
    <div class="col-md-6">
            <form action="registroProceso.php" method= "POST">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="usuario" class="form-control" name="usuario">
                </div> 
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name ="contrasenia">
                </div>    
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" name = "email">
                </div>       
                <button class="btn btn-primary">Registrarse</button>
            </form>
        
    </section>
    
</body>
</html>