<?php
    require_once("./validar_sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="">
    <div class="container mx-auto flex flex-col items-center p-3">
        <div class="m-0">
            <img class="mx-auto w-40" src="../img/logoHarinasElizondo.png" alt="Logo de Harinas Elizondo">
            <h2 class="text-xl text-center mb-2 font-bold">Certificado de Análisis</h2>
            <h3 class="text-xl text-center mb-2 font-bold underline">Harina Maite</h3>
            <h4 class="text-base text-center">Solicitada por:</h4>
            <h3 class="text-lg text-center underline">Cliente tal</h3>
            <div class="p-3 mt-4">
                <p class="text-sm"><span class="font-bold">Cantidad Solicitada:</span> 20 toneladas</p>
                <p class="text-sm"><span class="font-bold">Número de Lote:</span> 0004512</p>
                <p class="text-sm"><span class="font-bold">Número de Análisis:</span> 12</p>
                <p class="text-sm"><span class="font-bold">Fecha de Producción:</span> 24/06/2022</p>
                <p class="text-sm"><span class="font-bold">Fecha de Caducidad:</span> 24/06/2022</p>
                <p class="text-sm"><span class="font-bold">Domicilio de Entrega:</span> Tal</p>
                <p class="text-sm"><span class="font-bold">Contacto:</span> email</p>
                <p class="text-sm"><span class="font-bold">Nombre de Contacto:</span> Chema</p>
                <p class="text-sm"><span class="font-bold">Puesto del Contacto:</span> CEO</p>
            </div>
            <div class="rounded-lg">
                <table class="table-fixed rounded-xl border border-slate-300">
                    <thead class="rounded-xl">
                        <tr class="bg-gray-200 rounded-lg">
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-left text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-72">Prueba</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-44">Resultado</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-44">Unidad</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-52">Intervalo de Referencia</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-xl">
                        <tr>
                            <td colspan="4" class=" py-2 pl-2 pr-3 text-xs font-bold text-gray-900 sm:pl-6 lg:pl-8">Alveógrafo</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Resistencia</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">180</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">W</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">160 - 250</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Hinchamiento</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-red-400 sm:pl-6 lg:pl-8">
                                19
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">G</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">20 - 25</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Amplitud</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-red-400 sm:pl-6 lg:pl-8">
                                0.8
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">P/L</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">0.4 - 0.7</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Hidratación</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">65</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">%</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">50 - 70</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Humedad</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">14.5</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">%</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">14 - 15</td>
                        </tr>
                        <tr>
                            <td colspan="4" class=" py-2 pl-2 pr-3 text-xs font-bold text-gray-900 sm:pl-6 lg:pl-8">Farinógrafo</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Esfuerzo</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">575</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">UB</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">400 - 600</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Absorción</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-red-400 sm:pl-6 lg:pl-8">
                                35
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">%</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">50 - 70</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Estabilidad</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-red-400 sm:pl-6 lg:pl-8">
                                27
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">FU</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">18 - 23</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Rendimiento</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">68.2</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">%</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">60 - 75</td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8">Ceniza</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-green-400 sm:pl-6 lg:pl-8">0.34</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">%</td>
                            <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8">0.23 - 0.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/Meryl_Streep_Signature.svg/800px-Meryl_Streep_Signature.svg.png" alt="Firma" class="w-32 border-b border-black mx-auto mt-4">
            <p class="text-center text-xs font-bold">Responsable</p>
        </div>
    </div>
</body>

</html>