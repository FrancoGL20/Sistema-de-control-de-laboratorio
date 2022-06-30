<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    $query_analisis="SELECT id_analisis,id_lote,numero_en_lote FROM analisis order by id_lote asc,numero_en_lote asc;";
    $arreglo_analisis=hacerConsulta($query_analisis);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['analisis'])) {
        // var_dump($_POST);
        $query_analisis_unico="SELECT a.*,l.contenido FROM analisis as a join lotes as l on a.id_lote=l.id_lote where id_analisis={$_POST['analisis']};";
        $analisis=hacerConsulta($query_analisis_unico)[0];
        // var_dump($analisis);
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Análisis</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex flex-col items-center p-10">
        <div class="w-96 mt-5">
            <h1 class="text-2xl text-center mb-4 font-bold">Consultar Análisis</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="analisis" class="block text-gray-700 text-sm font-bold mb-2">
                        Info. de análisis
                    </label>
                    <select name="analisis" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elegir el análisis...</option>
                        <?php foreach ($arreglo_analisis as $analisis_select): ?>
                            <option value="<?= $analisis_select['id_analisis'] ?>">analisis <?= $analisis_select['id_analisis'] ?>, lote <?= $analisis_select['id_lote'] ?>, No. en lote <?= $analisis_select['numero_en_lote'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-7">
                    <button type="submit" name="buscarAnalisis" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
                            <th colspan="2" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-lg font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Datos del Análisis</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">No. Lote</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8"><?= isset($_POST['analisis'])?$analisis['id_lote']:"No. Lote"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">No. Análisis en lote <?= isset($_POST['analisis'])?$analisis['id_lote']:"X"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8"><?= isset($_POST['analisis'])?$analisis['numero_en_lote']:"No. analisis"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Tipo de Harina</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8"><?= isset($_POST['analisis'])?$analisis['contenido']:"contenido"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Alveógrafo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8"><?= isset($_POST['analisis'])?$analisis['id_alveografo']:"id_alveografo"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Farinógrafo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8"><?= isset($_POST['analisis'])?$analisis['id_farinografo']:"id_farinografo"?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Factor (Alveógrafo)</th>
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Resultado</th>
                        </tr>
                    </thead>
                    <!-- Valores referencia de alveografo -->
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Resistencia</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['resistencia']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Hinchamiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['hinchamiento']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Amplitud</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['amplitud']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Hidratación</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['hidratacion']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Humedad</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['humedad']:"res"?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Factor (Farinógrafo)</th>
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Resultado</th>
                        </tr>
                    </thead>
                    <!-- Valores referencia de farinografo -->
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Esfuerzo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['esfuerzo']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Absorción</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['absorcion']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Estabilidad</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['estabilidad']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Rendimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['rendimiento']:"res"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 text-center">Ceniza</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= isset($_POST['analisis'])?"":"text-gray-400"?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['analisis'])?$analisis['ceniza']:"res"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>