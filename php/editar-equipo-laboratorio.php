<!-- eliminar pre -->
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
    $error_no_garantia=$error_fecha_garantia=$mensajeAltaEquipo="";
    $hay_errores=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        // var_dump($_POST);
        $id=test_input($_POST['id']);
        $nombre=test_input($_POST['tipoEquipo']);
        $estado=test_input($_POST['estado']);
        $descripcion=test_input($_POST['descripcion']);
        $marca=test_input($_POST['marca']);
        $modelo=test_input($_POST['modelo']);
        $no_factura=test_input($_POST['no_factura']);
        $fecha_compra=test_input($_POST['fechaCompra']);
        $tiene_garantia=test_input($_POST['garantia']);
        $numero_garantia=test_input($_POST['numeroGarantia']);
        $venc_garantia=test_input($_POST['fechaVencimientoGarantia']);
        if($tiene_garantia=='si'){
            if($numero_garantia==''){
                $error_no_garantia="* Llenar campo faltante";
                $hay_errores=true;
            }
            if($venc_garantia==''){
                $error_fecha_garantia="* Seleccionar fecha";
                $hay_errores=true;
            }
            $parte_query_garantia=",numero_garantia='$numero_garantia',venc_garantia='$venc_garantia'";
        }else if($tiene_garantia=='no'){
            $parte_query_garantia=",numero_garantia='',venc_garantia=''";
        }
        $clave_mantenimiento=test_input($_POST['claveMantenimiento']);
        $fecha_ultimo_mantenimiento=test_input($_POST['fechaUltimoMantenimiento']);
        if (!$hay_errores) {
            $query_modificacion="UPDATE sistema_control_laboratorio.equipo_laboratorio SET tiene_garantia='$tiene_garantia',clave_mantenimiento='$clave_mantenimiento',marca='$marca',no_factura='$no_factura',nombre='$nombre',fecha_compra='$fecha_compra',fecha_ultimo_mantenimiento='$fecha_ultimo_mantenimiento',descripcion='$descripcion',modelo='$modelo',estado=$estado $parte_query_garantia WHERE id_equipo=$id;";
            echo $query_modificacion;
            ejecutarQuery($query_modificacion);
            header("Location: ./modificar-equipo-laboratorio.php");
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // var_dump($_GET);
        $id=test_input($_GET['i']);
        $query_info_equipo="SELECT * FROM equipo_laboratorio WHERE id_equipo='$id'";
        $info_equipo=hacerConsulta($query_info_equipo)[0];
        // print_r($info_equipo);
        $estado=$info_equipo['estado'];
        $nombre=$info_equipo['nombre'];
        $descripcion=$info_equipo['descripcion'];
        $marca=$info_equipo['marca'];
        $modelo=$info_equipo['modelo'];
        $no_factura=$info_equipo['no_factura'];
        $fecha_compra=$info_equipo['fecha_compra'];
        $tiene_garantia=$info_equipo['tiene_garantia'];
        $numero_garantia=$info_equipo['numero_garantia'];
        $venc_garantia=$info_equipo['venc_garantia'];
        $clave_mantenimiento=$info_equipo['clave_mantenimiento'];
        $fecha_ultimo_mantenimiento=$info_equipo['fecha_ultimo_mantenimiento'];
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
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem] overflow-y-auto h-[45rem] rounded-xl">
            <h1 class="text-2xl text-center font-bold mb-7">Editar Equipo de Laboratorio</h1>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
                        Estado
                    </label>
                    <select name="estado" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="1" <?= $estado=="1"?"selected":"" ?>>Dado de baja</option>
                        <option value="2" <?= $estado=="2"?"selected":"" ?>>Inactivo</option>
                        <option value="3" <?= $estado=="3"?"selected":"" ?>>Activo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tipo de equipo" class="block text-gray-700 text-sm font-bold mb-2">
                        Tipo De Equipo
                    </label>
                    <select name="tipoEquipo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="Alveógrafo" <?= $nombre=="Alveógrafo"?"selected":"" ?>>Alveógrafo</option>
                        <option value="Farinógrafo" <?= $nombre=="Farinógrafo"?"selected":"" ?>>Farinógrafo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">
                        Descripción
                    </label>
                    <textarea name="descripcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Descripción física (breve) del equipo..." cols="30" rows="3" required><?= $descripcion?></textarea>
                </div>
                <div class="mb-4">
                    <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">
                        Marca
                    </label>
                    <input type="text" name="marca" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="LG" required value="<?= $marca?>">
                </div>
                <div class="mb-4">
                    <label for="modelo" class="block text-gray-700 text-sm font-bold mb-2">
                        Modelo
                    </label>
                    <input type="text" name="modelo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required value="<?= $modelo?>">
                </div>
                <div class="mb-4">
                    <label for="no_factura" class="block text-gray-700 text-sm font-bold mb-2">
                        Número de factura
                    </label>
                    <input type="text" name="no_factura" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="01012021-0001" required value="<?=$no_factura?>">
                </div>
                <div class="mb-4">
                    <label for="fecha de compra" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Compra
                    </label>
                    <input type="date" name="fechaCompra" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" value="<?= $fecha_compra?>" required>
                </div>
                <div class="mb-4">
                    <h1 class="text-gray-700 text-sm font-bold mb-2">¿Garantía?</h1>
                    <div>
                        <input type="radio" id="show" name="garantia" value="si" <?= $tiene_garantia=='si'?"checked":""?>/>
                        <label for="valores de referencia propios" class="text-gray-700 text-xs font-bold mb-2">Sí</label>
                    </div>
                    <div>
                        <input type="radio" id="hide" name="garantia" value="no"  <?= $tiene_garantia=='no'?"checked":""?>/>
                        <label for="valores de referencia internacionales" class="text-gray-700 text-xs font-bold mb-2">No</label>
                    </div>
                    <div class="mb-4 mt-4" id="box">
                        <div class="mb-4">
                            <label for="numero de garantia" class="block text-gray-700 text-sm font-bold mb-2">
                                Número de Garantía <br><span class="error"><?= $error_no_garantia ?></span>
                            </label>
                            <input type="text" name="numeroGarantia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100345672" value="<?= $tiene_garantia=='si'?$numero_garantia:"" ?>">
                        </div>
                        <div class="mb-4">
                            <label for="fecha de vencimiento de la garantia" class="block text-gray-700 text-sm font-bold mb-2">
                                Fecha de Vencimiento de la Garantía <br><span class="error"><?= $error_fecha_garantia ?></span>
                            </label>
                            <input type="date" name="fechaVencimientoGarantia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" value="<?= $tiene_garantia=='si'?$venc_garantia:"" ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="clave de mantenimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Clave de Mantenimiento
                    </label>
                    <input type="text" name="claveMantenimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="100T" required value="<?= $clave_mantenimiento ?>">
                </div>
                <div class="mb-4">
                    <label for="fecha de ultimo mantenimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha de Último Mantenimiento
                    </label>
                    <input type="date" name="fechaUltimoMantenimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required value="<?= $fecha_ultimo_mantenimiento ?>">
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" value="<?=$id?>" name="id" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>