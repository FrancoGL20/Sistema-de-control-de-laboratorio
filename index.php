<?php
session_start();
if(isset($_SESSION['sesion'])){
    header("Location:php/dashboard.php");
}else{
    header("Location:php/iniciar_sesion.php");
}
?>