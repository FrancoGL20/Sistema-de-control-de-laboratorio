<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    $query_certificados="SELECT cer.*,cl.* FROM certificados as cer join clientes as cl on cer.id_cliente=cl.id_cliente;";
    $arreglo_certficados=hacerConsulta($query_certificados);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Certificado</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex justify-center items-center content-center">
        <div class="flex flex-col p-10 mt-10">
            <h1 class="text-2xl text-center mb-4 font-bold">Certificados</h1>
            <form method="post" action="" class="mt-0">
                <div class="mt-10 overflow-y-auto h-96 rounded-xl">
                    <table class="table-auto rounded-xl border border-slate-300">
                        <thead class="rounded-lg">
                            <tr class="bg-gray-200">
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">ID</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Fecha de Creación</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Cliente</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Ver</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Enviar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white rounded-lg">
                            <?php foreach ($arreglo_certficados as $certificado):?>
                            <tr>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8"><?=$certificado['id_certificado']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8"><?=$certificado['fecha_certificado']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8 text-center"><?=$certificado['nombre']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8 flex justify-center">
                                    <a href="./certificado.php?i=<?=$certificado['id_certificado']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-400 sm:pl-6 lg:pl-8 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</body>
</html>