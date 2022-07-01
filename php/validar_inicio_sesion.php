<?php

require_once("../config/config.php");
require_once("../DB/controlarDB.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$correoErr=$contraErr="";
$hay_errores=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // verifico si estan o no vacios
    if (empty($_POST["correo"])) {
        $correoErr = "* Correo requerido";
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
        // verificando existencia de usuario
        $existe_usuario=numeroRegistrosCon("SELECT * FROM usuarios where correo='$correo';");
        if ($existe_usuario==0) {
            $correoErr="* Usuario no existente";
            $hay_errores=true;
        }
    }

    if (!$hay_errores) {
        // verificando concordancia de contraseña
        $contraCorrecta=hacerConsulta("SELECT contrasena FROM usuarios where correo='$correo';")[0]['contrasena'];
        // var_dump($contraCorrecta);
        if (!(password_verify($contra, $contraCorrecta))) {
            $contraErr="* Contraseña incorrecta";
            $hay_errores=true;
        }
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
                $id=$userInfo['id_usuario'];
                $tipo=$userInfo['id_tipo'];
                if ($userInfo['correo'] == $correo and $verify) {
                    session_start();
                    $_SESSION['sesion']=array();
                    $_SESSION['sesion']['id']=$id;
                    $_SESSION['sesion']['correo']=$correo;
                    $_SESSION['sesion']['tipo']=(int)$tipo;
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
