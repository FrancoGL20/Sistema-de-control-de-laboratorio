<!-- eliminar pre -->
<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    $query_lista_alvs="SELECT * FROM equipo_laboratorio where nombre='Alveógrafo' and estado=3;";
    $arreglo_alvs=hacerConsulta($query_lista_alvs);

    $query_lista_farins="SELECT * FROM equipo_laboratorio where nombre='Farinógrafo' and estado=3;";
    $arreglo_farins=hacerConsulta($query_lista_farins);
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $alv=$fari=$numeroLote=$tipoHarina=$capacidad=$fechaCreacion=$fechaCaducidad=$resistencia=$hinchamiento=$amplitud=$hidratacion=$humedad=$esfuerzo=$absorcion=$estabilidad=$rendimiento=$ceniza="";
    
    $mensajeAltaLote=$errorId="";
    $hay_error=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // var_dump($_POST);
        // verificar numero de lote ya existente o no

        $numeroLote=test_input($_POST['numeroLote']);
        if(numeroRegistrosCon("select * from lotes where id_lote=$numeroLote")!="0"){
            $hay_error=true;
            $errorId="* Número de lote ya existente";
        }
        $alv=test_input($_POST['alveografo']);
        $fari=test_input($_POST['farinografo']);
        $tipoHarina=test_input($_POST['tipoHarina']);
        $capacidad=test_input($_POST['capacidad']);
        $fechaCreacion=test_input($_POST['fechaCreacion']);
        $fechaCaducidad=test_input($_POST['fechaCaducidad']);

        $resistencia=test_input($_POST['resistencia']);
        $hinchamiento=test_input($_POST['hinchamiento']);
        $amplitud=test_input($_POST['amplitud']);
        $hidratacion=test_input($_POST['hidratacion']);
        $humedad=test_input($_POST['humedad']);
        $esfuerzo=test_input($_POST['esfuerzo']);
        $absorcion=test_input($_POST['absorcion']);
        $estabilidad=test_input($_POST['estabilidad']);
        $rendimiento=test_input($_POST['rendimiento']);
        $ceniza=test_input($_POST['ceniza']);
        if (!$hay_error) {

            // inserción de lote y obtengo su id
            $query_insert_lote="INSERT INTO lotes (id_lote,capacidad,fecha_creacion,contenido,fecha_caducidad) VALUES ($numeroLote,$capacidad,'$fechaCreacion','$tipoHarina','$fechaCaducidad');";
            ejecutarQuery($query_insert_lote);

            // inserto el analisis
            $id_lote=$numeroLote;
            $query_insert_analisis="INSERT INTO analisis (id_lote,resistencia,hinchamiento,amplitud,hidratacion,humedad,esfuerzo,absorcion,estabilidad,rendimiento,ceniza,id_alveografo,id_farinografo) VALUES ($id_lote,$resistencia,$hinchamiento,$amplitud,$hidratacion,$humedad,$esfuerzo,$absorcion,$estabilidad,$rendimiento,$ceniza,$alv,$fari);";
            // echo $query_insert_lote;
            ejecutarQuery($query_insert_analisis);
            $mensajeAltaLote="\"Lote dado de alta con éxito\"";
        }
    }

?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Lotes</title>
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem] overflow-y-auto h-[45rem] rounded-xl">
            <h1 class="text-2xl text-center font-bold">Alta de Lote</h1>
            <span class="text-center font-bold"><?= $mensajeAltaLote?></span>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="numeroLote" class="block text-gray-700 text-sm font-bold mb-2">
                        Número de Lote <span class="error"><?= $errorId ?></span>
                    </label>
                    <input type="number" name="numeroLote" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="004562" required <?= $numeroLote!=""?"value=$numeroLote":"" ?>>
                </div>
                <div class="mb-4">
                    <label for="tipoHarina" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo Harina
                    </label>
                    <select name="tipoHarina" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" <?= !isset($_POST)?"selected":"" ?> disabled>Elija el tipo de harina...</option>
                        <option value="Hoja de Plata" <?= ($tipoHarina!="" && $tipoHarina=="Hoja de Plata")?"value=$tipoHarina":"" ?>>Hoja de Plata</option>
                        <option value="Ensenada" <?= ($tipoHarina!="" && $tipoHarina=="Ensenada")?"value=$tipoHarina":"" ?>>Ensenada</option>
                        <option value="Osasuna" <?= ($tipoHarina!="" && $tipoHarina=="Osasuna")?"value=$tipoHarina":"" ?>>Osasuna</option>
                        <option value="Maite" <?= ($tipoHarina!="" && $tipoHarina=="Maite")?"value=$tipoHarina":"" ?>>Maite</option>
                        <option value="Elizondo" <?= ($tipoHarina!="" && $tipoHarina=="Elizondo")?"value=$tipoHarina":"" ?>>Elizondo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="capacidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Capacidad (en toneladas)
                    </label>
                    <input type="number" name="capacidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100" required <?= $capacidad!=""?"value=$capacidad":"" ?>>
                </div>
                <div class="mb-4">
                    <label for="fechaCreacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Creación
                    </label>
                    <input type="date" name="fechaCreacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required <?= $fechaCreacion!=""?"value=$fechaCreacion":"" ?>>
                </div>
                <div class="mb-4">
                    <label for="fechaCaducidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Caducidad
                    </label>
                    <input type="date" name="fechaCaducidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required <?= $fechaCaducidad!=""?"value=$fechaCaducidad":"" ?>>
                </div>
                <!-- Datos del analisis inicial, que es obligatorio cada vez que crea un lote -->
                <h2  class="block text-gray-700 text-lg font-bold mb-4 text-center mt-8">Análisis Inicial</h2>
                <!-- Valores del alveografo -->
                <h2 class="text-gray-700 text-base font-bold mb-2 mt-4 text-center">Alveógrafo</h2>
                <div class="mb-4">
                    <label for="alveografo" class="block text-gray-700 text-sm font-bold mb-2">
                        Equipo
                    </label>
                    <select name="alveografo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elegir alveógrafo...</option>
                        <?php foreach ($arreglo_alvs as $alv):?>
                        <option value="<?= $alv['id_equipo'] ?>"><?= "Alveógrafo ".$alv['id_equipo'].", marca: ".$alv['marca'].", modelo: ".$alv['modelo'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mt-4 mb-4">
                    <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                        Resistencia
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="resistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="12" required <?= $resistencia!=""?"value=$resistencia":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Hinchamiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="hinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="8" required <?= $hinchamiento!=""?"value=$hinchamiento":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                        Amplitud
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="amplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="5" required <?= $amplitud!=""?"value=$amplitud":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Hidratación
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="hidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="12" required <?= $hidratacion!=""?"value=$hidratacion":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                        Humedad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="humedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="17" required <?= $humedad!=""?"value=$humedad":"" ?>>
                    </div>
                </div>
                <!-- Valores del farinografo -->
                <h2 class="text-gray-700 text-base font-bold mb-2 mt-7 text-center">Farinógrafo</h2>
                <div class="mb-4">
                    <label for="farinografo" class="block text-gray-700 text-sm font-bold mb-2">
                        Equipo
                    </label>
                    <select name="farinografo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elegir farinógrafo...</option>
                        <?php foreach ($arreglo_farins as $farin):?>
                        <option value="<?= $farin['id_equipo'] ?>"><?= "Farinógrafo ".$farin['id_equipo'].", marca: ".$farin['marca'].", modelo: ".$farin['modelo'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mt-4 mb-4">
                    <label for="esfuerzo" class="block text-gray-700 text-sm font-bold mb-2">
                        Esfuerzo
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="esfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="12" required <?= $esfuerzo!=""?"value=$esfuerzo":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                        Absorción
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="absorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="11" required <?= $absorcion!=""?"value=$absorcion":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Estabilidad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="estabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="3" required <?= $estabilidad!=""?"value=$estabilidad":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Rendimiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="rendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="0.01" required <?= $rendimiento!=""?"value=$rendimiento":"" ?>>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                        Ceniza
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="ceniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="0.20" required <?= $ceniza!=""?"value=$ceniza":"" ?>>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Dar de Alta
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>