<?php
    session_start();
    require_once("./validar_inicio_sesion.php");
    
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
            <h1 class="text-2xl text-center mb-4 font-bold">Alta de Usuarios</h1>
            <form action="" method="">
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="nombre@helizondo.com">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Contraseña
                    </label>
                    <input type="text" name="contrasena" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="**********">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo de Usuario
                    </label>
                    <select name="tipoPerfil" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <option value="" selected disabled>Elija el tipo de usuario...</option>
                        <option value="consultor">Consultor</option>
                        <option value="analista">Analista</option>
                        <option value="administrador">Administraddor</option>
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