<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function estadoALetra($estado){
        switch ($estado){
            case "1":
                $estado="Dado de baja";
                break;
            case "2":
                $estado="Inactivo";
                break;
            case "3":
                $estado="Activo";
                break;
            default:
                $estado="Estado invalido";
        }
        return $estado;
    }
    $query_inicial_consulta_equipo="SELECT id_equipo,nombre,marca,modelo from equipo_laboratorio;";
    $lista_equipos=hacerConsulta($query_inicial_consulta_equipo);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['equipo'])) {
        $query_equipo_unico="SELECT * from equipo_laboratorio WHERE id_equipo={$_POST['equipo']};";
        $equipo=hacerConsulta($query_equipo_unico)[0];
        // var_dump($equipo);
    }
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
            <form  method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="equipo de laboratorio" class="block text-gray-700 text-sm font-bold mb-2">
                        Equipo de Laboratorio
                    </label>
                    <select name="equipo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el equipo...</option>
                        <?php foreach ($lista_equipos as $equipo_select): ?>
                        <option value="<?= $equipo_select['id_equipo']?>"><?= ($equipo_select['id_equipo'].", ".$equipo_select['nombre'].", ".$equipo_select['marca'].", ".$equipo_select['modelo']) ?></option>
                        <?php endforeach; ?>
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
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?estadoALetra($equipo['estado']):"info_estado"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Tipo de Equipo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['nombre']:"info_nombre"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Descripción</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['descripcion']:"info_descripcion"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Marca</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['marca']:"info_marca"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Modelo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['modelo']:"info_modelo"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Compra</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['fecha_compra']:"info_fecha_compra"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Número de Factura</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['no_factura']:"info_no_factura"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">¿Garantía?</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['tiene_garantia']:"info_tiene_garantia"?></td>
                        </tr>
                        <?php if((!isset($equipo['tiene_garantia'])) || $equipo['tiene_garantia']=='si'): ?>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Número de Garantía</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['numero_garantia']:"info_numero_garantia"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Vencimiento de la Garantía</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['venc_garantia']:"info_venc_garantia"?></td>
                        </tr>
                        <?php endif ?>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Clave de Mantenimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['clave_mantenimiento']:"info_clave_mantenimiento"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Fecha de Último Mantenimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['equipo'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['equipo'])?$equipo['fecha_ultimo_mantenimiento']:"info_fecha_ultimo_mantenimiento"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>