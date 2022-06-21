<?php
session_start();
if(isset($_SESSION['sesion_personal'])){
    header("Location:php/dashboard.php");
}else{
    header("Location:php/iniciar_sesion.php");
}
?>
<h1>Pantalla principal</h1>