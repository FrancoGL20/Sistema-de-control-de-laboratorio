<?php

require_once("../config/config.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$hay_errores=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["correo"])) {
        $correoErr = "* correo requerido";
        $hay_errores = true;
    } else {
        $correo = test_input($_POST["correo"]);
    }
    if (empty($_POST["contraseña"])) {
        $contraErr = "* Contraseña requerida";
        $hay_errores = true;
    } else {
        $contra = test_input($_POST["contraseña"]);
    }

    if (!$hay_errores) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            $query="SELECT * FROM usuarios where correo='$correo';";
            $result = mysqli_query($con, $query);
            $userInfo = mysqli_fetch_array($result);
            if ($userInfo) {
                //Unhash password and autenticate the user
                $hashedPassword = $userInfo['contrasena'];
                $verify = password_verify($contra, $hashedPassword);
                if ($userInfo['correo'] == $correo and $verify) {
                    session_start();
                    $_SESSION['sesion']=array();
                    $_SESSION['sesion']['id']=$id;
                    $_SESSION['sesion']['correo']=$correo;
                    $_SESSION['sesion']['tipo']=$tipo;
                    //enviar a index
                    header("Location: ./dashboard.php");
                } else {
                    $errorMessage = 'Correo y/o contraseña incorrectos.';
                }
            } else {
                $errorMessage = 'Tu cuenta aún no ha sido registrada.';
            }
        }
    }
}
