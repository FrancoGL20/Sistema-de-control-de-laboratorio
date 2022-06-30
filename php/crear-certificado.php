<!-- eliminar pre -->
<pre>
<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    // consultas iniciales
    $query_lista_clientes="SELECT id_cliente,nombre FROM clientes;";
    $arreglo_clientes=hacerConsulta($query_lista_clientes);
    $query_analisis="SELECT id_analisis,id_lote,numero_en_lote FROM analisis order by id_lote asc,numero_en_lote asc;";
    $arreglo_analisis=hacerConsulta($query_analisis);
    $mensajeAltaCertificado="";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // cuando se mande crear un certificado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // var_dump($_POST);
        $id_cliente=test_input($_POST["id_cliente"]);
        $id_analisis=test_input($_POST["id_analisis"]);
        $cantidad=test_input($_POST["cantidad"]);
        $fecha=test_input($_POST["fecha"]);

        $query_crear_certificado="INSERT INTO certificados (id_cliente,fecha_certificado,id_analisis,cantidad_en_tons) VALUES ($id_cliente,'$fecha',$id_analisis,$cantidad);";
        // echo $query_crear_certificado;
        ejecutarQuery($query_crear_certificado);
        $mensajeAltaCertificado="\"Certificado creado con éxito\"";
    }
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Certificado</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="background">
    <div class="container mx-auto flex justify-center">
        <div class="flex flex-col p-20 gap-5 border border-slate-200 shadow-2xl bg-blue-100/40 backdrop-blur-sm mt-20 w-[28rem] overflow-y-auto rounded-xl">
            <h1 class="text-2xl text-center font-bold mb-7">Crear Certificado</h1>
            <span class="text-center font-bold"><?= $mensajeAltaCertificado?></span>
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="id_cliente" class="block text-gray-700 text-sm font-bold mb-2">
                        Cliente
                    </label>
                    <select name="id_cliente" list="lotes" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el cliente...</option>
                        <?php foreach ($arreglo_clientes as $cliente):?>
                        <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="id_analisis" class="block text-gray-700 text-sm font-bold mb-2">
                        Análisis
                    </label>
                    <select name="id_analisis" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="" selected disabled>Elija el análisis...</option>
                        <?php foreach ($arreglo_analisis as $analisis_select): ?>
                        <option value="<?= $analisis_select['id_analisis'] ?>">analisis <?= $analisis_select['id_analisis'] ?>, lote <?= $analisis_select['id_lote'] ?>, No. en lote <?= $analisis_select['numero_en_lote'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-4 mb-4">
                    <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Cantidad Requerida (en toneladas)
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" name="cantidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="12" required>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="fecha del certificado" class="block text-gray-700 text-sm font-bold mb-2">
                        Fecha del Certificado
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="date" name="fecha" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="12" required>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="submit" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Crear Certificado
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>