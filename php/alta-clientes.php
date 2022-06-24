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
    $errorRfc=$mensajeAltaCliente="";
    $hay_error=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // print_r($_POST);
        #  información personal
        $nombre=test_input($_POST['nombre']);
        $arreglo_domicilio=$_POST['domicilio'];
        $arreglo_domicilio=array_map("test_input",$arreglo_domicilio);
        $arreglo_temporal_domicilio=[];
        //primeros 3 datos
        array_push($arreglo_temporal_domicilio,...array_slice($arreglo_domicilio,0,3));
        // si hay numero interior
        if(isset($_POST['n_interior'])){
            array_push($arreglo_temporal_domicilio,test_input($_POST['n_interior']));
        }
        //resto de datos
        array_push($arreglo_temporal_domicilio,...array_slice($arreglo_domicilio,3));
        $domicilio=implode(", ",$arreglo_temporal_domicilio);
        $rfc=test_input($_POST['rfc']);
        $nombreContacto=test_input($_POST['nombreContacto']);
        $correo=test_input($_POST['correo']);
        $puestoContacto=test_input($_POST['puestoContacto']);
        if(strlen($rfc)!=13){
            $errorRfc="* longitud de RFC incorrecta";
            $hay_error=true;
        }
        if (!$hay_error) {
            # info de los valores de referencia

            $query_valores_internacionales="SELECT * FROM v_de_referencia WHERE id_valores=1";
            $limites_int_sin_formato=hacerConsulta($query_valores_internacionales)[0];
            // var_dump($limites_int_sin_formato);
            $limites_int_inferiores=[];
            $limites_int_superiores=[];
            $unidades_medida=[];
            for ($i=1; $i <= 10; $i++) {
                $limites_int_inferiores[$i]=explode(',', $limites_int_sin_formato[$i])[0];
                $limites_int_superiores[$i]=explode(',', $limites_int_sin_formato[$i])[1];
                $unidades_medida[$i]=explode(',', $limites_int_sin_formato[$i])[2];
            }
            // print_r($limites_int_inferiores);
            // print_r($limites_int_superiores);


            $nuevo=false; // hacer un nuevo registro de v_de_ref o no?
            if (test_input($_POST['limiteInferiorResistencia'])=="") {
                $limiteInferiorResistencia=$limites_int_inferiores[1];
            } else {
                $nuevo=true;
                $limiteInferiorResistencia=test_input($_POST['limiteInferiorResistencia']);
            }
            if (test_input($_POST['limiteInferiorHinchamiento'])=="") {
                $limiteInferiorHinchamiento=$limites_int_inferiores[2];
            } else {
                $nuevo=true;
                $limiteInferiorHinchamiento=test_input($_POST['limiteInferiorHinchamiento']);
            }
            if (test_input($_POST['limiteInferiorAmplitud'])=="") {
                $limiteInferiorAmplitud=$limites_int_inferiores[3];
            } else {
                $nuevo=true;
                $limiteInferiorAmplitud=test_input($_POST['limiteInferiorAmplitud']);
            }
            if (test_input($_POST['limiteInferiorHidratacion'])=="") {
                $limiteInferiorHidratacion=$limites_int_inferiores[4];
            } else {
                $nuevo=true;
                $limiteInferiorHidratacion=test_input($_POST['limiteInferiorHidratacion']);
            }
            if (test_input($_POST['limiteInferiorHumedad'])=="") {
                $limiteInferiorHumedad=$limites_int_inferiores[5];
            } else {
                $nuevo=true;
                $limiteInferiorHumedad=test_input($_POST['limiteInferiorHumedad']);
            }
            if (test_input($_POST['limiteInferiorEsfuerzo'])=="") {
                $limiteInferiorEsfuerzo=$limites_int_inferiores[6];
            } else {
                $nuevo=true;
                $limiteInferiorEsfuerzo=test_input($_POST['limiteInferiorEsfuerzo']);
            }
            if (test_input($_POST['limiteInferiorAbsorcion'])=="") {
                $limiteInferiorAbsorcion=$limites_int_inferiores[7];
            } else {
                $nuevo=true;
                $limiteInferiorAbsorcion=test_input($_POST['limiteInferiorAbsorcion']);
            }
            if (test_input($_POST['limiteInferiorEstabilidad'])=="") {
                $limiteInferiorEstabilidad=$limites_int_inferiores[8];
            } else {
                $nuevo=true;
                $limiteInferiorEstabilidad=test_input($_POST['limiteInferiorEstabilidad']);
            }
            if (test_input($_POST['limiteInferiorRendimiento'])=="") {
                $limiteInferiorRendimiento=$limites_int_inferiores[9];
            } else {
                $nuevo=true;
                $limiteInferiorRendimiento=test_input($_POST['limiteInferiorRendimiento']);
            }
            if (test_input($_POST['limiteInferiorCeniza'])=="") {
                $limiteInferiorCeniza=$limites_int_inferiores[10];
            } else {
                $nuevo=true;
                $limiteInferiorCeniza=test_input($_POST['limiteInferiorCeniza']);
            }


            // fari
            if (test_input($_POST['limiteSuperiorResistencia'])=="") {
                $limiteSuperiorResistencia=$limites_int_superiores[1];
            } else {
                $nuevo=true;
                $limiteSuperiorResistencia=test_input($_POST['limiteSuperiorResistencia']);
            }
            if (test_input($_POST['limiteSuperiorHinchamiento'])=="") {
                $limiteSuperiorHinchamiento=$limites_int_superiores[2];
            } else {
                $nuevo=true;
                $limiteSuperiorHinchamiento=test_input($_POST['limiteSuperiorHinchamiento']);
            }
            if (test_input($_POST['limiteSuperiorAmplitud'])=="") {
                $limiteSuperiorAmplitud=$limites_int_superiores[3];
            } else {
                $nuevo=true;
                $limiteSuperiorAmplitud=test_input($_POST['limiteSuperiorAmplitud']);
            }
            if (test_input($_POST['limiteSuperiorHidratacion'])=="") {
                $limiteSuperiorHidratacion=$limites_int_superiores[4];
            } else {
                $nuevo=true;
                $limiteSuperiorHidratacion=test_input($_POST['limiteSuperiorHidratacion']);
            }
            if (test_input($_POST['limiteSuperiorHumedad'])=="") {
                $limiteSuperiorHumedad=$limites_int_superiores[5];
            } else {
                $nuevo=true;
                $limiteSuperiorHumedad=test_input($_POST['limiteSuperiorHumedad']);
            }
            if (test_input($_POST['limiteSuperiorEsfuerzo'])=="") {
                $limiteSuperiorEsfuerzo=$limites_int_superiores[6];
            } else {
                $nuevo=true;
                $limiteSuperiorEsfuerzo=test_input($_POST['limiteSuperiorEsfuerzo']);
            }
            if (test_input($_POST['limiteSuperiorAbsorcion'])=="") {
                $limiteSuperiorAbsorcion=$limites_int_superiores[7];
            } else {
                $nuevo=true;
                $limiteSuperiorAbsorcion=test_input($_POST['limiteSuperiorAbsorcion']);
            }
            if (test_input($_POST['limiteSuperiorEstabilidad'])=="") {
                $limiteSuperiorEstabilidad=$limites_int_superiores[8];
            } else {
                $nuevo=true;
                $limiteSuperiorEstabilidad=test_input($_POST['limiteSuperiorEstabilidad']);
            }
            if (test_input($_POST['limiteSuperiorRendimiento'])=="") {
                $limiteSuperiorRendimiento=$limites_int_superiores[9];
            } else {
                $nuevo=true;
                $limiteSuperiorRendimiento=test_input($_POST['limiteSuperiorRendimiento']);
            }
            if (test_input($_POST['limiteSuperiorCeniza'])=="") {
                $limiteSuperiorCeniza=$limites_int_superiores[10];
            } else {
                $nuevo=true;
                $limiteSuperiorCeniza=test_input($_POST['limiteSuperiorCeniza']);
            }
            $o1=$limiteInferiorResistencia.",".$limiteSuperiorResistencia.",".$unidades_medida[1];
            $o2=$limiteInferiorHinchamiento.",".$limiteSuperiorHinchamiento.",".$unidades_medida[2];
            $o3=$limiteInferiorAmplitud.",".$limiteSuperiorAmplitud.",".$unidades_medida[3];
            $o4=$limiteInferiorHidratacion.",".$limiteSuperiorHidratacion.",".$unidades_medida[4];
            $o5=$limiteInferiorHumedad.",".$limiteSuperiorHumedad.",".$unidades_medida[5];
            $o6=$limiteInferiorEsfuerzo.",".$limiteSuperiorEsfuerzo.",".$unidades_medida[6];
            $o7=$limiteInferiorAbsorcion.",".$limiteSuperiorAbsorcion.",".$unidades_medida[7];
            $o8=$limiteInferiorEstabilidad.",".$limiteSuperiorEstabilidad.",".$unidades_medida[8];
            $o9=$limiteInferiorRendimiento.",".$limiteSuperiorRendimiento.",".$unidades_medida[9];
            $o10=$limiteInferiorCeniza.",".$limiteSuperiorCeniza.",".$unidades_medida[10];
        }
        /**
         * si nuevo=false->inserto solo eal cliente con id=1
         * si nuevo=true-> inserto todos los valores, obtengo el id insertado y registro al cliente
         */
        if(!$nuevo){
            $id_valores_a_insertar=1;
        }else{
            $query_insertar_valores="INSERT INTO sistema_control_laboratorio.v_de_referencia (resistencia,hinchamiento,amplitud,hidratacion,humedad,esfuerzo,absorcion,estabilidad,rendimiento,ceniza) VALUES  ('$o1','$o2','$o3','$o4','$o5','$o6','$o7','$o8','$o9','$o10');";
            $id_valores_a_insertar = insertarYObtenerUltimoIdIsertado($query_insertar_valores);
            // var_dump($id_valores_a_insertar);
        }
        
        /**
         * Inserción de los datos
         */
        $insercion_cliente="INSERT INTO sistema_control_laboratorio.clientes (id_valores,correo,domicilio,nombre,rfc,nombre_contacto,puesto_de_contacto) VALUES ($id_valores_a_insertar,'$correo','$domicilio','$nombre','$rfc','$nombreContacto','$puestoContacto');";
        ejecutarQuery($insercion_cliente);
        $mensajeAltaCliente="\"Cliente registrado con éxito\"";
    }
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm my-20 w-[28rem] overflow-y-auto h-[45rem]">
            <h1 class="text-2xl text-center font-bold">Alta de Clientes</h1>
            <span class="text-center font-bold"><?= $mensajeAltaCliente ?></span>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-base font-bold mb-2">
                        Nombre
                    </label>
                    <input type="text" name="nombre" id="nombre" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Panes López" required>
                </div>
                <!-- DOMICILIO INICIO -->
                <h2 class="block text-gray-700 text-base font-bold mb-2">Domicilio</h2>
                <div class="mb-4">
                    <label for="calle" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Calle
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Avenida Los Manzanos" required>
                </div>
                <div class="mb-4">
                    <label for="colonia" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Colonia
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Vista del Valle" required>
                </div>
                <div class="mb-4">
                    <label for="numero exterior" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Número Exterior
                    </label>
                    <input type="number" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="1" required>
                </div>
                <div class="mb-4">
                    <label for="numero interior" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Número Interior (Opcional)
                    </label>
                    <input type="number" name="n_interior" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="22" >
                </div>
                <div class="mb-4">
                    <label for="municipio" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Municipio
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Álvaro Obregón" required>
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Estado
                    </label>
                    <select name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Seleccione el estado...</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="CDMX">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="codigo postal" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Código Postal
                    </label>
                    <input type="number" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="53476" required>
                </div>
                <div class="mb-4">
                    <label for="rfc" class="block text-gray-700 text-base font-bold mb-2">
                        RFC <span class="error"><?= $errorRfc?></span>
                    </label>
                    <input type="text" name="rfc" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="RTQW876542WE" required>
                </div>
                <!-- DOMICILIO FIN -->
                <div class="mb-4">
                    <label for="nombre de contacto" class="block text-gray-700 text-base font-bold mb-2">
                        Nombre de Contacto
                    </label>
                    <input type="text" name="nombreContacto" id="nombreContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Martín Hernández" required>
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-base font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" id="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="correocontacto@gmail.com" required>
                </div>
                <div class="mb-4">
                    <label for="puesto del contacto" class="block text-gray-700 text-base font-bold mb-2">
                        Puesto del Contacto
                    </label>
                    <input type="text" name="puestoContacto" id="puestoContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="CEO" required>
                </div>
                <!-- Si el cliente tiene valores de referencia, entonces mostramos los siguientes campos... -->
                <details class="mt-4">
                    <summary class=" text-gray-700 text-sm font-bold">Si el cliente tiene valores de referencia propios, hacer click aquí.</summary>
                    <!-- Valores del alveografo -->
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-4 text-center">Alveógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                            Resistencia
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Hinchamiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                            Amplitud
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                            Hidratación
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                            Humedad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <!-- Valores del farinografo -->
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-7 text-center">Farinógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="esfuerzo" class="block text-gray-700 text-sm font-bold mb-2">
                            Esfuerzo
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                            Absorción
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                            Estabilidad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Rendimiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                            Ceniza
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" step="0.01" name="limiteSuperiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                </details>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="altaCliente" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Dar de Alta
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>