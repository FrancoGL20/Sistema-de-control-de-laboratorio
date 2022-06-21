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
    </head>
    <body class="background">
        <div class="container mx-auto flex h-screen items-center justify-center">
            <div class="w-full max-w-xs bg-gray-100 shadow-md rounded p-8 flex flex-col justify-around">
                <img src="../img/logoHarinasElizondo.png" class="w-52 self-center mb-4" alt="">
                <form class="m-0" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                            Correo
                        </label>
                        <input type="email" name="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="nombre@helizondo.com">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Contraseña
                        </label>
                        <input type="password" name="contraseña" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="**********">
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit" name="submit" class="mb-4 bg-blue-800 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
                <p class="text-center text-xs">
                    &copy;Harinas Elizondo. Derechos Reservados.
                </p>
            </div>
        </div>
    </body>
</html>