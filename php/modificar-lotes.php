<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    $query_lista_lotes="SELECT * FROM lotes;";
    $arreglo_lotes=hacerConsulta($query_lista_lotes);
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
    <div class="container mx-auto flex justify-center items-center content-center">
        <div class="flex flex-col p-10 mt-10">
            <h1 class="text-2xl text-center mb-4 font-bold">Lotes</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mt-0">
                <div class="mt-10 overflow-y-auto h-96 rounded-xl">
                    <table class="table-auto rounded-xl border border-slate-300">
                        <thead class="rounded-lg">
                            <tr class="bg-gray-200">
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">No. Lote</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Tipo de Harina</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Capacidad</th>
                                <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Editar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white rounded-lg">
                            
                            <?php foreach ($arreglo_lotes as $lote):?>
                            <tr>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8"><?= $lote['id_lote']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center"><?= $lote['contenido']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center"><?= $lote['capacidad']?></td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 flex justify-center">
                                    <a href="./editar-lote.php?i=<?= $lote['id_lote']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
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