<?php

session_start();
if(isset($_SESSION['sesion'])){
    unset($_SESSION['sesion']);
}
session_destroy();
header("Location: http://localhost/Sistema-de-control-de-laboratorio/index.php");
