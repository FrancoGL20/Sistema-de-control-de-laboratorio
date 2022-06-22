<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function checkemail($str){
        return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@(helizondo\.com)$/ix", $str)) ? true : false;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $errorCorreo=$exitoInsercion="";
    $hay_error=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST);
        $correo=test_input($_POST['correo']);
        if(!checkemail($correo)){
            $hay_error=true;
            $errorCorreo="*El correo no es de la empresa";
        }
        if(!$hay_error){
            $contrasena=test_input($_POST['contrasena']);
            $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);
            $tipoPerfil=test_input($_POST['tipoPerfil']);
            $query_existencia_usuario="SELECT * FROM usuarios WHERE correo='$correo'";
            $resultado_consulta=numeroRegistrosCon($query_existencia_usuario);
            // var_dump($resultado_consulta);
            if($resultado_consulta!=0){
                $hay_error=true;
                $errorCorreo="*Usuario ya existente";
            }
        }
        if(!$hay_error){
            $query_registro="INSERT INTO sistema_control_laboratorio.usuarios (correo,contrasena,id_tipo) VALUES ('$correo','$contrasenaHasheada',$tipoPerfil);";
            $resultado_registro=hacerInsercion($query_registro);
            // var_dump($resultado_registro);
            if($resultado_registro==true){
                $exitoInsercion="Usuario registrado con éxito";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex justify-center">
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem]">
            <div> <h1 class="text-2xl text-center font-bold mb-7">Alta de Usuarios</h1>
            <p class="text-center font-bold" style="margin-top: 5px;"><?= $exitoInsercion?></p></div>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo <span class="error"><?= $errorCorreo?></span>
                    </label>
                    <input type="email" name="correo" id="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="nombre@helizondo.com" required>
                </div>
                <div class="mb-4">
                    <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">
                        Contraseña
                    </label>
                    <input type="text" name="contrasena" id="contrasena" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="**********" required>
                </div>
                <div class="mb-4">
                    <label for="tipoPerfil" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo de Usuario
                    </label>
                    <select name="tipoPerfil" id="tipoPerfil" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el tipo de usuario...</option>
                        <option value="1">Consultor</option>
                        <option value="2">Analista</option>
                        <option value="3">Administraddor</option>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Dar de Alta
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>