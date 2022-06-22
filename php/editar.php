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
            <form method="" action="">
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" id="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="nombre@helizondo.com" required>
                </div>
                <div class="mb-7">
                    <label for="tipoPerfil" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo de Usuario
                    </label>
                    <select name="tipoPerfil" id="tipoPerfil" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="1" selected>Consultor</option>
                        <option value="2">Analista</option>
                        <option value="3">Administraddor</option>
                    </select>
                </div>
                <details>
                    <summary class=" text-gray-700 text-sm font-bold">Si deseas editar la contraseña, haz click aquí.</summary>
                    <div class="mt-4 mb-4">
                        <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">
                            Nueva Contraseña
                        </label>
                        <input type="text" name="contrasena" id="contrasena" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="**********" required>
                    </div>
                </details>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="editar" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>