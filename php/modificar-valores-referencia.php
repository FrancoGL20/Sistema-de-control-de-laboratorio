<!-- eliminar pre -->
<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $mensajeUpdateValores="";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $limiteInferiorResistencia=test_input($_POST['limiteInferiorResistencia']);
        $limiteSuperiorResistencia=test_input($_POST['limiteSuperiorResistencia']);
        $unidadResistencia=test_input($_POST['unidadResistencia']);
        $limiteInferiorHinchamiento=test_input($_POST['limiteInferiorHinchamiento']);
        $limiteSuperiorHinchamiento=test_input($_POST['limiteSuperiorHinchamiento']);
        $unidadHinchamiento=test_input($_POST['unidadHinchamiento']);
        $limiteInferiorAmplitud=test_input($_POST['limiteInferiorAmplitud']);
        $limiteSuperiorAmplitud=test_input($_POST['limiteSuperiorAmplitud']);
        $unidadAmplitud=test_input($_POST['unidadAmplitud']);
        $limiteInferiorHidratacion=test_input($_POST['limiteInferiorHidratacion']);
        $limiteSuperiorHidratacion=test_input($_POST['limiteSuperiorHidratacion']);
        $unidadHidratacion=test_input($_POST['unidadHidratacion']);
        $limiteInferiorHumedad=test_input($_POST['limiteInferiorHumedad']);
        $limiteSuperiorHumedad=test_input($_POST['limiteSuperiorHumedad']);
        $unidadHumedad=test_input($_POST['unidadHumedad']);
        $limiteInferiorEsfuerzo=test_input($_POST['limiteInferiorEsfuerzo']);
        $limiteSuperiorEsfuerzo=test_input($_POST['limiteSuperiorEsfuerzo']);
        $unidadEsfuerzo=test_input($_POST['unidadEsfuerzo']);
        $limiteInferiorAbsorcion=test_input($_POST['limiteInferiorAbsorcion']);
        $limiteSuperiorAbsorcion=test_input($_POST['limiteSuperiorAbsorcion']);
        $unidadAbsorcion=test_input($_POST['unidadAbsorcion']);
        $limiteInferiorEstabilidad=test_input($_POST['limiteInferiorEstabilidad']);
        $limiteSuperiorEstabilidad=test_input($_POST['limiteSuperiorEstabilidad']);
        $unidadEstabilidad=test_input($_POST['unidadEstabilidad']);
        $limiteInferiorRendimiento=test_input($_POST['limiteInferiorRendimiento']);
        $limiteSuperiorRendimiento=test_input($_POST['limiteSuperiorRendimiento']);
        $unidadRendimiento=test_input($_POST['unidadRendimiento']);
        $limiteInferiorCeniza=test_input($_POST['limiteInferiorCeniza']);
        $limiteSuperiorCeniza=test_input($_POST['limiteSuperiorCeniza']);
        $unidadCeniza=test_input($_POST['unidadCeniza']);

        $o1=$limiteInferiorResistencia.",".$limiteSuperiorResistencia.",".$unidadResistencia;
        $o2=$limiteInferiorHinchamiento.",".$limiteSuperiorHinchamiento.",".$unidadHinchamiento;
        $o3=$limiteInferiorAmplitud.",".$limiteSuperiorAmplitud.",".$unidadAmplitud;
        $o4=$limiteInferiorHidratacion.",".$limiteSuperiorHidratacion.",".$unidadHidratacion;
        $o5=$limiteInferiorHumedad.",".$limiteSuperiorHumedad.",".$unidadHumedad;
        $o6=$limiteInferiorEsfuerzo.",".$limiteSuperiorEsfuerzo.",".$unidadEsfuerzo;
        $o7=$limiteInferiorAbsorcion.",".$limiteSuperiorAbsorcion.",".$unidadAbsorcion;
        $o8=$limiteInferiorEstabilidad.",".$limiteSuperiorEstabilidad.",".$unidadEstabilidad;
        $o9=$limiteInferiorRendimiento.",".$limiteSuperiorRendimiento.",".$unidadRendimiento;
        $o10=$limiteInferiorCeniza.",".$limiteSuperiorCeniza.",".$unidadCeniza;

        $query_update_valores="UPDATE sistema_control_laboratorio.v_de_referencia SET resistencia='$o1',hidratacion='$o4',amplitud='$o3',hinchamiento='$o2',esfuerzo='$o6',humedad='$o5',estabilidad='$o8',absorcion='$o7',ceniza='$o10',rendimiento='$o9' WHERE id_valores=1;";
        ejecutarQuery($query_update_valores);
        $mensajeUpdateValores="\"Valores Internacionales cambiados con éxito\"";
    }
    $query_valores="SELECT * FROM v_de_referencia WHERE id_valores=1;";
    $valores=hacerConsulta($query_valores)[0];
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Valores de Referencia Internacionales</title>
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[34rem] overflow-y-auto h-[45rem] rounded-xl">
            <h1 class="text-xl text-center font-bold">Modificar Valores de Referencia Internacionales</h1>
            <span class="text-center font-bold"><?= $mensajeUpdateValores?></span>
            <form method="post" action="">
                <!-- Valores del alveografo -->
                <h2 class="text-gray-700 text-base font-bold mb-2 mt-2 text-center">Alveógrafo</h2>
                <div class="mt-4 mb-4">
                    <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                        Resistencia
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['resistencia'])[0]?>" type="number" step="0.01" name="limiteInferiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['resistencia'])[1]?>" type="number" step="0.01" name="limiteSuperiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['resistencia'])[2]?>" type="text" name="unidadResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Hinchamiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['hinchamiento'])[0]?>" type="number" step="0.01" name="limiteInferiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['hinchamiento'])[1]?>" type="number" step="0.01" name="limiteSuperiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['hinchamiento'])[2]?>" type="text" name="unidadHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                        Amplitud
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['amplitud'])[0]?>" type="number" step="0.01" name="limiteInferiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['amplitud'])[1]?>" type="number" step="0.01" name="limiteSuperiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['amplitud'])[2]?>" type="text" name="unidadAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Hidratación
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['hidratacion'])[0]?>" type="number" step="0.01" name="limiteInferiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['hidratacion'])[1]?>" type="number" step="0.01" name="limiteSuperiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['hidratacion'])[2]?>" type="text" name="unidadHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                        Humedad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['humedad'])[0]?>" type="number" step="0.01" name="limiteInferiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['humedad'])[1]?>" type="number" step="0.01" name="limiteSuperiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['humedad'])[2]?>" type="text" name="unidadHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <!-- Valores del farinografo -->
                <h2 class="text-gray-700 text-base font-bold mb-2 mt-7 text-center">Farinógrafo</h2>
                <div class="mt-4 mb-4">
                    <label for="esfuerzo" class="block text-gray-700 text-sm font-bold mb-2">
                        Esfuerzo
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['esfuerzo'])[0]?>" type="number" step="0.01" name="limiteInferiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['esfuerzo'])[1]?>" type="number" step="0.01" name="limiteSuperiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['esfuerzo'])[2]?>" type="text" name="unidadEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                        Absorción
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['absorcion'])[0]?>" type="number" step="0.01" name="limiteInferiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['absorcion'])[1]?>" type="number" step="0.01" name="limiteSuperiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['absorcion'])[2]?>" type="text" name="unidadAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Estabilidad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['estabilidad'])[0]?>" type="number" step="0.01" name="limiteInferiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['estabilidad'])[1]?>" type="number" step="0.01" name="limiteSuperiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['estabilidad'])[2]?>" type="text" name="unidadEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Rendimiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['rendimiento'])[0]?>" type="number" step="0.01" name="limiteInferiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['rendimiento'])[1]?>" type="number" step="0.01" name="limiteSuperiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['rendimiento'])[2]?>" type="text" name="unidadRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                        Ceniza
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input value="<?= explode(",", $valores['ceniza'])[0]?>" type="number" step="0.01" name="limiteInferiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required>
                        <input value="<?= explode(",", $valores['ceniza'])[1]?>" type="number" step="0.01" name="limiteSuperiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required>
                        <input value="<?= explode(",", $valores['ceniza'])[2]?>" type="text" name="unidadCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad" required>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>