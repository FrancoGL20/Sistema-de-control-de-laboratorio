<?php
    require_once("./validar_sesion_iniciada.php");
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem] overflow-y-auto h-[45rem] rounded-xl">
            <h1 class="text-2xl text-center font-bold mb-7">Alta de Equipo de Laboratorio</h1>
            <form method="post" action="">
                <div class="mb-4">
                    <label for="tipo de equipo" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo De Equipo
                    </label>
                    <select name="tipoEquipo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el tipo de equipo...</option>
                        <option value="1">Alveógrafo</option>
                        <option value="2">Farinógrafo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">
                        Descripción
                    </label>
                    <textarea name="descripcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Descripción física (breve) del equipo..." cols="30" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">
                        Marca
                    </label>
                    <input type="text" name="marca" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="LG" required>
                </div>
                <div class="mb-4">
                    <label for="modelo" class="block text-gray-700 text-sm font-bold mb-2">
                        Modelo
                    </label>
                    <input type="text" name="modelo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required>
                </div>
                <div class="mb-4">
                    <label for="fecha de compra" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Compra
                    </label>
                    <input type="date" name="fechaCompra" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required>
                </div>
                <div class="mb-4">
                    <h1 class="text-gray-700 text-sm font-bold mb-2">¿Garantía?</h1>
                    <div>
                        <input type="radio" id="show" name="garantia" value="no" />
                        <label for="valores de referencia propios" class="text-gray-700 text-xs font-bold mb-2">Sí</label>
                    </div>
                    <div>
                        <input type="radio" id="hide" name="garantia" value="si" checked />
                        <label for="valores de referencia internacionales" class="text-gray-700 text-xs font-bold mb-2">No</label>
                    </div>
                    <div class="mb-4 mt-4 hidden" id="box">
                        <div class="mb-4">
                            <label for="numero de garantia" class="block text-gray-700 text-sm font-bold mb-2">
                                Número de Garantía
                            </label>
                            <input type="number" name="numeroGarantia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100345672">
                        </div>
                        <div class="mb-4">
                            <label for="fecha de vencimiento de la garantia" class="block text-gray-700 text-sm font-bold mb-2">
                                Fecha de Vencimiento de la Garantía
                            </label>
                            <input type="date" name="fechaVencimientoGarantia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="clave de mantenimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Clave de Mantenimiento
                    </label>
                    <input type="text" name="claveMantenimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required>
                </div>
                <div class="mb-4">
                    <label for="fecha de ultimo mantenimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Último Mantenimiento
                    </label>
                    <input type="date" name="fechaUltimoMantenimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"required>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Dar de Alta
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>