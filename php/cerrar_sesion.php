<?php

session_start();
if(isset($_SESSION['sesion_personal'])){
    unset($_SESSION['sesion_personal']);
}
if (session_destroy()) {
    header("Location: http://localhost/Sistema-de-control-de-laboratorio/index.php");
}