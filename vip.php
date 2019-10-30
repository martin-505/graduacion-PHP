<?php 
session_start();
$sesion=$_SESSION["usuario"];
if (isset($sesion)){
    echo "esta seccion es para puros ";

}
else {
    header("Location: login.php");
}


?>