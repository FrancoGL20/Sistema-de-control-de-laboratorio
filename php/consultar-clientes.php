<!-- eliminar esto -->
<pre>
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
    $query_inicial_consulta_cliente="SELECT id_cliente,nombre,correo from clientes;";
    $lista_usuarios=hacerConsulta($query_inicial_consulta_cliente);
    // var_dump($lista_usuarios);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cliente'])) {
        $query_cliente_unico="SELECT
                                c.*,
                                v.*
                            FROM clientes AS c
                            JOIN v_de_referencia AS v
                            ON c.id_valores = v.id_valores
                            WHERE c.id_cliente={$_POST['cliente']};";
        $cliente=hacerConsulta($query_cliente_unico)[0];
        // var_dump($cliente);
    }
?>
</pre> 
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
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="cliente" class="block text-gray-700 text-sm font-bold mb-2">
                        Cliente
                    </label>
                    <select name="cliente" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el cliente...</option>
                        <?php foreach ($lista_usuarios as $cliente_select): ?>
                        <option value="<?= $cliente_select['id_cliente']?>"><?= ($cliente_select['id_cliente'].", ".$cliente_select['nombre'].", ".$cliente_select['correo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-7">
                    <button type="submit" name="buscarCliente" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
                            <th colspan="2" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-lg font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Datos del Cliente</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Nombre</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['nombre']:"nombre"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Correo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['correo']:"correo"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Domicilio</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['domicilio']:"domicilio"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">RFC</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['rfc']:"rfc"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Estado</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?estadoALetra($cliente['estado']):"estado"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Nombre de Contacto</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['nombre_contacto']:"nombre contacto"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Puesto del Contacto</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8"><?= isset($_POST['cliente'])?$cliente['puesto_de_contacto']:"puesto de contacto"?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th colspan="4" class="border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-base font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Valores de Referencia <?= isset($_POST['cliente'])?($cliente['id_valores']=="1"?"Internacionales":"Propios"):"Internacionales o Propios"?></th>
                        </tr>
                    </thead>
                    <!-- Valores referencia de alveografo -->
                    <tbody class="bg-white rounded-lg">
                        <tr class="bg-gray-200">
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Factor (Alveógrafo)</th>
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Límite Inferior</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Límite Superior</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Unidad de medida</th>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Resistencia</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['resistencia'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['resistencia'])[1]:"LS"?></td></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['resistencia'])[2]:"UM"?></td></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Hinchamiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hinchamiento'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hinchamiento'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hinchamiento'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Amplitud</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['amplitud'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['amplitud'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['amplitud'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Hidratación</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hidratacion'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hidratacion'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['hidratacion'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Humedad</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['humedad'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['humedad'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['humedad'])[2]:"UM"?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-auto rounded-xl border border-slate-300 w-[34rem]">
                    <thead class="rounded-lg">
                        <tr class="bg-gray-200">
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Factor (Farinógrafo)</th>
                            <th class="sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Límite Inferior</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Límite Superior</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Unidad de medida</th>
                        </tr>
                    </thead>
                    <!-- Valores referencia de farinografo -->
                    <tbody class="bg-white rounded-lg">
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Esfuerzo</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['esfuerzo'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['esfuerzo'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['esfuerzo'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Absorción</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['absorcion'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['absorcion'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['absorcion'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Estabilidad</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['estabilidad'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['estabilidad'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['estabilidad'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Rendimiento</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['rendimiento'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['rendimiento'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['rendimiento'])[2]:"UM"?></td>
                        </tr>
                        <tr>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Ceniza</td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['ceniza'])[0]:"LI"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['ceniza'])[1]:"LS"?></td>
                            <td class="border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium <?= !isset($_POST['cliente'])?"text-gray-400":""?> sm:pl-6 lg:pl-8 text-center"><?= isset($_POST['cliente'])?explode(",",$cliente['ceniza'])[2]:"UM"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>