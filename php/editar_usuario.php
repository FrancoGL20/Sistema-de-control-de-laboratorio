<!-- ELIMINAR PRE -->
<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
        $id=test_input($_POST['editar']);
        $correo=test_input($_POST['correo']);
        $tipoPerfil=$_POST['tipoPerfil'];
        $cambiarContrasena="";
        if(!empty($_POST['contrasena'])){
            $contrasena=test_input($_POST['contrasena']);
            $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);
            $cambiarContrasena=",contrasena='$contrasenaHasheada'";
        }
        $query_modificacion="UPDATE usuarios
        SET correo='$correo',id_tipo=$tipoPerfil".$cambiarContrasena."
        WHERE id_usuario=$id;";
        ejecutarQuery($query_modificacion);
        header("Location: ./modificar-usuarios.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id=test_input($_GET['i']);
        $query_info_usuario="SELECT * FROM usuarios WHERE id_usuario='$id'";
        $info_usuario=hacerConsulta($query_info_usuario);
    }
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
<div class="container mx-auto flex justify-center">
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem]">
            <h1 class="text-2xl text-center font-bold mb-7">Editar Usuario</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" id="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="nombre@helizondo.com" required value="<?= $info_usuario[0]['correo'] ?>">
                </div>
                <div class="mb-7">
                    <label for="tipoPerfil" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo de Usuario
                    </label>
                    <select name="tipoPerfil" id="tipoPerfil" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="1" <?= $info_usuario[0]['id_tipo']=="1"?"selected":""?>>Consultor</option>
                        <option value="2" <?= $info_usuario[0]['id_tipo']=="2"?"selected":""?>>Analista</option>
                        <option value="3" <?= $info_usuario[0]['id_tipo']=="3"?"selected":""?>>Administrador</option>
                    </select>
                </div>
                <details>
                    <summary class=" text-gray-700 text-sm font-bold">Si se desea cambiar la contraseña, click aquí.</summary>
                    <div class="mt-4 mb-4">
                        <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">
                            Nueva Contraseña
                        </label>
                        <input type="text" name="contrasena" id="contrasena" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="**********">
                    </div>
                </details>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="editar" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="<?= $id; ?>">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>