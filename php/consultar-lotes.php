<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    $query_lotes="SELECT * FROM lotes";
    $info_lotes=hacerConsulta($query_lotes);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lote'])) {
        $query_lote_unico="SELECT * FROM lotes where id_lote={$_POST['lote']};";
        $lote=hacerConsulta($query_lote_unico)[0];
        // var_dump($cliente);
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Lotes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex flex-col items-center p-10">
        <div class="w-96 mt-5">
            <h1 class="text-2xl text-center mb-4 font-bold">Consultar Lotes</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="numero de lote" class="block text-gray-700 text-sm font-bold mb-2">
                        Número de Lote
                    </label>
                    <select name="lote" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el número de lote...</option>
                        <?php foreach ($info_lotes as $lote_select): ?>
                        <option value="<?= $lote_select['id_lote']?>"><?= "lote ".($lote_select['id_lote']." con cap de ".$lote_select['capacidad']." tons, contiene ".$lote_select['contenido']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-7">
                    <button type="submit" name="buscarLote" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
                            <th colspan="2" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-lg font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">No. Lote <?= isset($_POST['lote'])?"{$lote['id_lote']}":"NL" ?></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-xl">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Tipo de Harina</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['lote'])?"":"text-gray-400" ?> sm:pl-6 lg:pl-8"><?= isset($_POST['lote'])?"{$lote['contenido']}":"TA" ?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Cantidad (en toneladas)</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['lote'])?"":"text-gray-400" ?> sm:pl-6 lg:pl-8"><?= isset($_POST['lote'])?"{$lote['capacidad']}":"CAP" ?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Creación</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['lote'])?"":"text-gray-400" ?> sm:pl-6 lg:pl-8"><?= isset($_POST['lote'])?"{$lote['fecha_creacion']}":"FC" ?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Caducidad</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['lote'])?"":"text-gray-400" ?> sm:pl-6 lg:pl-8"><?= isset($_POST['lote'])?"{$lote['fecha_caducidad']}":"FCAD" ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>