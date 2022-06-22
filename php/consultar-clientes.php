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
    <title>Consultar Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex flex-col items-center p-10">
        <div class="w-96 mt-5">
            <h1 class="text-2xl text-center mb-4 font-bold">Consultar Clientes</h1>
            <form action="" method="">
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo del Cliente
                    </label>
                    <input type="email" name="cliente" list="clientes" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Escriba el correo del cliente..." required>
                </div>
                <div class="flex items-center justify-center mt-7">
                    <button type="submit" name="buscarCliente" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Consultar
                    </button>
                </div>
                <datalist id="clientes">
                    <option value="cliente1@gmail.com"></option>
                    <option value="cliente2@hotmail.com"></option>
                    <option value="cliente3@yahoo.com"></option>
                </datalist>
            </form>
        </div>
        <div class="mt-7">
            <div class="mt-10 h-96 rounded-xl">
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th colspan="2" class="sticky top-0 z-10 border-b border-gray-300 bg-slate-50/10 backdrop-blur-xs py-3.5 pl-4 pr-3 text-left text-lg font-bold text-gray-900 sm:pl-6 lg:pl-8 text-center">Nombre del cliente</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Nombre</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Nombre del Cliente</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Correo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">nombre@example.com</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Domicilio</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Acueducto Fuentes Brotantes #1, Vista del Valle, Estado de Mexico</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">RFC</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">RTYU98657901SA</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Estado</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Activo</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Nombre de Contacto</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">Jose Maria Macias</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Puesto del Contacto</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8">CEO</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>