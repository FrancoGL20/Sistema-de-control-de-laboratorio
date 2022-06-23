<?php
require_once("../config/config.php");
session_start();
if(isset($_SESSION['sesion'])){
    unset($_SESSION['sesion']);
}
session_destroy();
header("Location: $url");
