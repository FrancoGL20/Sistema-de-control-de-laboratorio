<?php
session_start();
require_once("../config/config.php");

if(!isset($_SESSION['sesion'])){
    header("Location: $url");
}