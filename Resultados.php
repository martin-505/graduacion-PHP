<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <p class="text-info">
        <?php
            $usuario=$_POST["usuario"];
            echo $usuario; 
        ?>
    </p>
    <p class="text-info">
         <?php
            $password=$_POST["password"];
            echo $password;
        ?>
    </p>
    
</body>
</html>