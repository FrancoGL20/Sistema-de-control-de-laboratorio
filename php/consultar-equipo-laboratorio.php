<?php
    require_once("./validar_sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Equipo de Laboratorio</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex flex-col items-center p-10">
        <div class="w-96 mt-5">
            <h1 class="text-2xl text-center mb-4 font-bold">Consultar Equipo de Laboratorio</h1>
            <form action="" method="">
                <div class="mb-4">
                    <label for="equipo de laboratorio" class="block text-gray-700 text-sm font-bold mb-2">
                        Equipo de Laboratorio
                    </label>
                    <select name="equipoLaboratorio" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el equipo...</option>
                        <option value="1">Alveógrafo Tal</option>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-7">
                    <button type="submit" name="buscarEquipoLab" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Consultar
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-7">
            <div class="mt-10 h-96 rounded-xl h-96 overflow-y-auto">
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th colspan="2" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-lg font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Datos del Equipo</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Estado</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Activo</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Tipo de Equipo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Alveógrafo</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Descripción</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Blanco, grande, con rayas azules, etc.</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Marca</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Samsung</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Modelo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">100T</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Compra</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">20/08/2020</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Número de Factura</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">100304567</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">¿Garantía?</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Si</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Número de Garantía</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Solo desplegar este renglon si tiene garantia</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Vencimiento de la Garantía</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Solo desplegar este renglon si tiene garantia</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Clave de Mantenimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">MSLA1008465</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Último Mantenimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">20/08/2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>