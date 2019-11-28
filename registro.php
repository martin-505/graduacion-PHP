<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Registro</title>
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
                    
                                
                    </div>
                         
                </section>
    
    
</body>
</html>