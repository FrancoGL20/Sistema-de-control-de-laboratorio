<!-- ELIMINAR PRE -->
<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id=test_input($_GET['i']);
        $query_info_cliente="SELECT
                                c.*,
                                v.*
                            FROM clientes AS c
                            JOIN v_de_referencia AS v
                            ON c.id_valores = v.id_valores
                            WHERE c.id_cliente={$_GET['i']};";
        $info_cliente=hacerConsulta($query_info_cliente)[0];
        // var_dump($info_cliente);
        $domicilio_arreglo=explode(", ", $info_cliente['domicilio']);
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        var_dump($_POST);
        # manejando el cambio o no de valores de referencia
        $opcion_valores=$_POST['valoresRef'];
        if($opcion_valores=="internacionales"){
            if($_POST['id_valores']=="1"){ // ***int a int
                // el id de valores se queda igual
                $id_valores=1;
            }else{ // ***prop a int
                // eliminar el prop anterior
                $query_borrar_valores="DELETE FROM v_de_referencia WHERE id_valores={$_POST['id_valores']};";
                ejecutarQuery($query_borrar_valores);
                // colocar id en 1
                $id_valores=1;
            }
        }else if($opcion_valores=="propios"){
            $limiteInferiorResistencia=test_input($_POST['limiteInferiorResistencia']);
            $limiteInferiorHinchamiento=test_input($_POST['limiteInferiorHinchamiento']);
            $limiteInferiorAmplitud=test_input($_POST['limiteInferiorAmplitud']);
            $limiteInferiorHidratacion=test_input($_POST['limiteInferiorHidratacion']);
            $limiteInferiorHumedad=test_input($_POST['limiteInferiorHumedad']);
            $limiteInferiorEsfuerzo=test_input($_POST['limiteInferiorEsfuerzo']);
            $limiteInferiorAbsorcion=test_input($_POST['limiteInferiorAbsorcion']);
            $limiteInferiorEstabilidad=test_input($_POST['limiteInferiorEstabilidad']);
            $limiteInferiorRendimiento=test_input($_POST['limiteInferiorRendimiento']);
            $limiteInferiorCeniza=test_input($_POST['limiteInferiorCeniza']);
            $limiteSuperiorResistencia=test_input($_POST['limiteSuperiorResistencia']);
            $limiteSuperiorHinchamiento=test_input($_POST['limiteSuperiorHinchamiento']);
            $limiteSuperiorAmplitud=test_input($_POST['limiteSuperiorAmplitud']);
            $limiteSuperiorHidratacion=test_input($_POST['limiteSuperiorHidratacion']);
            $limiteSuperiorHumedad=test_input($_POST['limiteSuperiorHumedad']);
            $limiteSuperiorEsfuerzo=test_input($_POST['limiteSuperiorEsfuerzo']);
            $limiteSuperiorAbsorcion=test_input($_POST['limiteSuperiorAbsorcion']);
            $limiteSuperiorEstabilidad=test_input($_POST['limiteSuperiorEstabilidad']);
            $limiteSuperiorRendimiento=test_input($_POST['limiteSuperiorRendimiento']);
            $limiteSuperiorCeniza=test_input($_POST['limiteSuperiorCeniza']);

            $query_valores_internacionales="SELECT * FROM v_de_referencia WHERE id_valores=1";
            $limites_int_sin_formato=hacerConsulta($query_valores_internacionales)[0];
            $unidades_medida=[];
            for ($i=1; $i <= 10; $i++) {
                $unidades_medida[$i]=explode(',', $limites_int_sin_formato[$i])[2];
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
            if($_POST['id_valores']=="1"){ // ***int a prop
                // insertar los nuevos
                $query_insertar_valores="INSERT INTO v_de_referencia (resistencia,hinchamiento,amplitud,hidratacion,humedad,esfuerzo,absorcion,estabilidad,rendimiento,ceniza) VALUES  ('$o1','$o2','$o3','$o4','$o5','$o6','$o7','$o8','$o9','$o10');";
                // obtener el id de los nuevos y asignarlo
                $id_valores = insertarYObtenerUltimoIdIsertado($query_insertar_valores);
            }else{ // ***prop a prop
                // el id se queda como estaba antes
                $id_valores=$_POST['id_valores'];
                // actualiza el registro
                $query_actualizar_valores="UPDATE v_de_referencia SET resistencia='$o1',hinchamiento='$o2',amplitud='$o3',hidratacion='$o4',humedad='$o5',esfuerzo='$o6',absorcion='$o7',estabilidad='$o8',rendimiento='$o9',ceniza='$o10' WHERE id_valores=$id_valores;";
                ejecutarQuery($query_actualizar_valores);
            }
        }
        // recibir todos los datos y actualizar la info del cliente
        $id_cliente=test_input($_POST['id_cliente']);
        $estado=$_POST['estado'];
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $nombreContacto=$_POST['nombreContacto'];
        $rfc=$_POST['rfc'];
        $puestoContacto=$_POST['puestoContacto'];

        $arreglo_domicilio=$_POST['domicilio'];
        $domicilio=implode(", ",array_map("test_input",$arreglo_domicilio));

        $query_actualizar_cliente="UPDATE clientes SET nombre_contacto='$nombreContacto',nombre='$nombre',id_valores=$id_valores,correo='$correo',estado=$estado,domicilio='$domicilio',rfc='$rfc',puesto_de_contacto='$puestoContacto' WHERE id_cliente=$id_cliente;";
        // echo $query_actualizar_cliente;
        ejecutarQuery($query_actualizar_cliente);
        header("Location: $url/php/modificar-clientes.php");
    }
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
            <h1 class="text-2xl text-center font-bold mb-7">Editar Cliente</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input name="id_cliente" type="hidden" value="<?=$id?>">
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
                        Estado
                    </label>
                    <select name="estado" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="1" <?= $info_cliente['estado']=="1"?"selected":"" ?>>Dado de baja</option>
                        <option value="2" <?= $info_cliente['estado']=="2"?"selected":"" ?>>Inactivo</option>
                        <option value="3" <?= $info_cliente['estado']=="3"?"selected":"" ?>>Activo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre
                    </label>
                    <input type="text" name="nombre" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Panes López" required value="<?= $info_cliente['nombre'] ?>">
                </div>
                <h2 class="block text-gray-700 text-base font-bold mb-2">Domicilio</h2>
                <div class="mb-4">
                    <label for="calle" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Calle
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Avenida Los Manzanos" required value="<?= $domicilio_arreglo[0]?>">
                </div>
                <div class="mb-4">
                    <label for="colonia" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Colonia
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Vista del Valle" required value="<?= $domicilio_arreglo[1]?>">
                </div>
                <div class="mb-4">
                    <label for="numero exterior" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Número Exterior
                    </label>
                    <input type="number" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="1" required value="<?= $domicilio_arreglo[2]?>">
                </div>
                <div class="mb-4">
                    <label for="numero interior" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Número Interior (Opcional)
                    </label>
                    <input type="number" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="22" value="<?= $domicilio_arreglo[3]?>">
                </div>
                <div class="mb-4">
                    <label for="municipio" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Municipio
                    </label>
                    <input type="text" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Álvaro Obregón" required value="<?= $domicilio_arreglo[4]?>">
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Estado
                    </label>
                    <select name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option <?= $domicilio_arreglo[5]=="Aguascalientes"?"selected":""?> value="Aguascalientes">Aguascalientes</option>
                        <option <?= $domicilio_arreglo[5]=="Baja California"?"selected":""?> value="Baja California">Baja California</option>
                        <option <?= $domicilio_arreglo[5]=="Baja California Sur"?"selected":""?> value="Baja California Sur">Baja California Sur</option>
                        <option <?= $domicilio_arreglo[5]=="Campeche"?"selected":""?> value="Campeche">Campeche</option>
                        <option <?= $domicilio_arreglo[5]=="Chiapas"?"selected":""?> value="Chiapas">Chiapas</option>
                        <option <?= $domicilio_arreglo[5]=="Chihuahua"?"selected":""?> value="Chihuahua">Chihuahua</option>
                        <option <?= $domicilio_arreglo[5]=="CDMX"?"selected":""?> value="CDMX">Ciudad de México</option>
                        <option <?= $domicilio_arreglo[5]=="Coahuila"?"selected":""?> value="Coahuila">Coahuila</option>
                        <option <?= $domicilio_arreglo[5]=="Colima"?"selected":""?> value="Colima">Colima</option>
                        <option <?= $domicilio_arreglo[5]=="Durango"?"selected":""?> value="Durango">Durango</option>
                        <option <?= $domicilio_arreglo[5]=="Estado de México"?"selected":""?> value="Estado de México">Estado de México</option>
                        <option <?= $domicilio_arreglo[5]=="Guanajuato"?"selected":""?> value="Guanajuato">Guanajuato</option>
                        <option <?= $domicilio_arreglo[5]=="Guerrero"?"selected":""?> value="Guerrero">Guerrero</option>
                        <option <?= $domicilio_arreglo[5]=="Hidalgo"?"selected":""?> value="Hidalgo">Hidalgo</option>
                        <option <?= $domicilio_arreglo[5]=="Jalisco"?"selected":""?> value="Jalisco">Jalisco</option>
                        <option <?= $domicilio_arreglo[5]=="Michoacán"?"selected":""?> value="Michoacán">Michoacán</option>
                        <option <?= $domicilio_arreglo[5]=="Morelos"?"selected":""?> value="Morelos">Morelos</option>
                        <option <?= $domicilio_arreglo[5]=="Nayarit"?"selected":""?> value="Nayarit">Nayarit</option>
                        <option <?= $domicilio_arreglo[5]=="Nuevo"?"selected":""?> value="Nuevo León">Nuevo León</option>
                        <option <?= $domicilio_arreglo[5]=="Oaxaca"?"selected":""?> value="Oaxaca">Oaxaca</option>
                        <option <?= $domicilio_arreglo[5]=="Puebla"?"selected":""?> value="Puebla">Puebla</option>
                        <option <?= $domicilio_arreglo[5]=="Querétaro"?"selected":""?> value="Querétaro">Querétaro</option>
                        <option <?= $domicilio_arreglo[5]=="Quintana Roo"?"selected":""?> value="Quintana Roo">Quintana Roo</option>
                        <option <?= $domicilio_arreglo[5]=="San Luis Potosí"?"selected":""?> value="San Luis Potosí">San Luis Potosí</option>
                        <option <?= $domicilio_arreglo[5]=="Sinaloa"?"selected":""?> value="Sinaloa">Sinaloa</option>
                        <option <?= $domicilio_arreglo[5]=="Sonora"?"selected":""?> value="Sonora">Sonora</option>
                        <option <?= $domicilio_arreglo[5]=="Tabasco"?"selected":""?> value="Tabasco">Tabasco</option>
                        <option <?= $domicilio_arreglo[5]=="Tamaulipas"?"selected":""?> value="Tamaulipas">Tamaulipas</option>
                        <option <?= $domicilio_arreglo[5]=="Tlaxcala"?"selected":""?> value="Tlaxcala">Tlaxcala</option>
                        <option <?= $domicilio_arreglo[5]=="Veracruz"?"selected":""?> value="Veracruz">Veracruz</option>
                        <option <?= $domicilio_arreglo[5]=="Yucatán"?"selected":""?> value="Yucatán">Yucatán</option>
                        <option <?= $domicilio_arreglo[5]=="Zacatecas"?"selected":""?> value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="codigo postal" class="block text-gray-700 text-sm font-bold mb-2">
                        &nbsp;&nbsp;&nbsp;Código Postal
                    </label>
                    <input type="number" name="domicilio[]" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="53476" required value="<?= $domicilio_arreglo[6]?>">
                </div>
                <div class="mb-4">
                    <label for="rfc" class="block text-gray-700 text-sm font-bold mb-2">
                        RFC
                    </label>
                    <input type="text" name="rfc" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="RTQW876542WE" required value="<?= $info_cliente['rfc'] ?>">
                </div>
                <div class="mb-4">
                    <label for="nombre de contacto" class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre de Contacto
                    </label>
                    <input type="text" name="nombreContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Martín Hernández" required value="<?= $info_cliente['nombre_contacto'] ?>">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="correocontacto@gmail.com" required value="<?= $info_cliente['correo'] ?>">
                </div>
                <div class="mb-4">
                    <label for="puesto del contacto" class="block text-gray-700 text-sm font-bold mb-2">
                        Puesto del Contacto
                    </label>
                    <input type="text" name="puestoContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="CEO" required value="<?= $info_cliente['puesto_de_contacto'] ?>">
                </div>
                <div>
                    <h1 class="text-gray-700 text-sm font-bold mb-2">Valores de referencia</h1>
                    <div>
                        <input type="radio" id="hide" name="valoresRef" value="internacionales" <?= $info_cliente['id_valores']=="1"?"checked":""?>/>
                        <label for="hide" class="text-gray-700 text-xs font-bold mb-2">Valores de Referencia Internacionales</label>
                    </div>
                    <div>
                        <input type="radio" id="show" name="valoresRef" value="propios" <?= $info_cliente['id_valores']!="1"?"checked":""?>/>
                        <label for="show" class="text-gray-700 text-xs font-bold mb-2">Valores de Referencia Propios</label>
                    </div>
                </div>
                <div class="mt-7" id="box">
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-4 text-center">Alveógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                            Resistencia
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['resistencia'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['resistencia'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Hinchamiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['hinchamiento'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['hinchamiento'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                            Amplitud
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['amplitud'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['amplitud'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                            Hidratación
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['hidratacion'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['hidratacion'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                            Humedad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['humedad'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['humedad'])[1]?>">
                        </div>
                    </div>
                    <!-- Valores del farinografo -->
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-7 text-center">Farinógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="esfuerzo" class="block text-gray-700 text-sm font-bold mb-2">
                            Esfuerzo
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['esfuerzo'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['esfuerzo'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                            Absorción
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['absorcion'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['absorcion'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                            Estabilidad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['estabilidad'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['estabilidad'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Rendimiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['rendimiento'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['rendimiento'])[1]?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                            Ceniza
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" step="0.01" name="limiteInferiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf." required value="<?= explode(",",$info_cliente['ceniza'])[0]?>">
                            <input type="number" step="0.01" name="limiteSuperiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup." required value="<?= explode(",",$info_cliente['ceniza'])[1]?>">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="id_valores" value="<?= $info_cliente['id_valores'] ?>" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>