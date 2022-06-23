<?php
    require_once("./validar_sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Lotes</title>
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem] overflow-y-auto h-[45rem] rounded-xl">
            <h1 class="text-2xl text-center font-bold mb-7">Editar Lote</h1>
            <form method="post" action="">
                <div class="mb-4">
                    <label for="numero de lote" class="block text-gray-700 text-sm font-bold mb-2">
                        Número de Lote
                    </label>
                    <input type="number" name="numeroLote" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="004562" required>
                </div>
                <div class="mb-4">
                    <label for="tipo de harina" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo Harina
                    </label>
                    <select name="contenido" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el tipo de harina...</option>
                        <option value="1">Hoja de Plata</option>
                        <option value="2">Ensenada</option>
                        <option value="3">Osasuna</option>
                        <option value="4">Elizondo</option>
                        <option value="5" selected>Maite</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="capacidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Capacidad (en toneladas)
                    </label>
                    <input type="number" name="capacidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100" required>
                </div>
                <div class="mb-4">
                    <label for="fecha de creacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Creación
                    </label>
                    <input type="date" name="fechaCreacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                </div>
                <div class="mb-4">
                    <label for="fecha de caducidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Caducidad
                    </label>
                    <input type="date" name="fechaUltimoMantenimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>