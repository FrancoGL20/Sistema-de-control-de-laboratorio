<?php
ob_start();
?>

<?php
    require_once("./validar_sesion_iniciada.php");
    require_once("../DB/controlarDB.php");
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // certificado
    $id_certificado=test_input($_GET['i']);
    $query_certificado="SELECT * FROM certificados WHERE id_certificado=$id_certificado;";
    $certificado=hacerConsulta($query_certificado)[0];
    // print_r($certificado);

    // analisis
    $id_analisis=$certificado['id_analisis'];
    $query_analisis="SELECT * FROM analisis WHERE id_analisis=$id_analisis;";
    $analisis=hacerConsulta($query_analisis)[0];
    // print_r($analisis);

    // lotes
    $id_lote=$analisis['id_lote'];
    $query_lote="SELECT * FROM lotes WHERE id_lote=$id_lote;";
    $lote=hacerConsulta($query_lote)[0];
    // print_r($lote);

    // cliente
    $id_cliente=$certificado['id_cliente'];
    $query_cliente="SELECT * FROM clientes WHERE id_cliente=$id_cliente;";
    $cliente=hacerConsulta($query_cliente)[0];
    // print_r($cliente);

    // valores de referencia
    $id_valores=$cliente['id_valores'];
    $query_valores="SELECT * FROM v_de_referencia WHERE id_valores=$id_valores;";
    $valores_de_referencia=hacerConsulta($query_valores)[0];
    // print_r($valores_de_referencia);

    // limites inferiores, superiores y unidades de medida
    $limites_inferiores=[];
    $limites_superiores=[];
    $unidades_medida=[];
    for ($i=1; $i <= 10; $i++) {
        $limites_inferiores[$i]=(float) (explode(',', $valores_de_referencia[$i])[0]);
        $limites_superiores[$i]=(float) (explode(',', $valores_de_referencia[$i])[1]);
        $unidades_medida[$i]=explode(',', $valores_de_referencia[$i])[2];
    }
    // print_r($limites_inferiores);
    // print_r($limites_superiores);
    // print_r($unidades_medida);

    // arreglo de palabras de valores de referencia
    $palabras=[];
    $palabras[1]="Resistencia";
    $palabras[2]="Hinchamiento";
    $palabras[3]="Amplitud";
    $palabras[4]="Hidratacion";
    $palabras[5]="Humedad";
    $palabras[6]="Esfuerzo";
    $palabras[7]="Absorcion";
    $palabras[8]="Estabilidad";
    $palabras[9]="Rendimiento";
    $palabras[10]="Ceniza";

    // arreglo de los valores del analisis
    $resultado=[];
    $resultado[1]=(float) ($analisis['resistencia']);
    $resultado[2]=(float) ($analisis['hinchamiento']);
    $resultado[3]=(float) ($analisis['amplitud']);
    $resultado[4]=(float) ($analisis['hidratacion']);
    $resultado[5]=(float) ($analisis['humedad']);
    $resultado[6]=(float) ($analisis['esfuerzo']);
    $resultado[7]=(float) ($analisis['absorcion']);
    $resultado[8]=(float) ($analisis['estabilidad']);
    $resultado[9]=(float) ($analisis['rendimiento']);
    $resultado[10]=(float) ($analisis['ceniza']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <?php require_once("./navbar.php"); ?> 
</head>

<body class="" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 0.75rem; line-height: 1rem;">
    <div class="container mx-auto flex flex-col items-center p-3" 
    style="
        margin: auto;
        padding: 0.75rem;
    ">
        <div class="m-0">
            <img class="mx-auto w-40" src="http://<?= $_SERVER['HTTP_HOST'] ?>/Sistema-de-control-de-laboratorio//img/logoFran.jpeg" alt="Logo de Harinas Elizondo" style="width: 100%;">
            <h2 class="text-xl text-center mb-2 font-bold" style="text-align: center;">Certificado de Análisis</h2>
            <h3 class="text-xl text-center mb-2 font-bold underline" style="text-align: center; text-decoration: underline;">Harina <?= $lote['contenido'] ?></h3>
            <h4 class="text-base text-center" style="text-align: center;">Solicitada por:</h4>
            <h3 class="text-lg text-center underline" style="text-align: center;">Cliente <?= $cliente['nombre'] ?></h3>
            <div class="p-3 mt-4" style="margin: 3rem auto;">
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Cantidad Solicitada: </span><?= $certificado['cantidad_requerida'] ?> toneladas</p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Número de Lote:</span> <?= $lote['id_lote'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Número de Análisis:</span> <?= $analisis['id_analisis'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Fecha de Producción:</span> <?= $lote['fecha_creacion'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Fecha de Caducidad:</span> <?= $lote['fecha_caducidad'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Domicilio de Entrega:</span> <?= $cliente['domicilio'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Contacto:</span> <?= $cliente['correo'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Nombre de Contacto:</span> <?= $cliente['nombre_contacto'] ?></p>
                <p class="text-sm" style="margin: 0;"><span class="font-bold" style="font-weight: bold;">Puesto del Contacto:</span> <?= $cliente['puesto_de_contacto'] ?></p>
            </div>
            <div class="rounded-lg">
                <table class="table-fixed rounded-xl border border-slate-300" style="table-layout: auto; border: solid 2px rgb(203 213 225); border-radius: 5px;">
                    <thead class="rounded-xl">
                        <tr class="bg-gray-200 rounded-lg" style="background: rgb(229 231 235);">
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-left text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-72" style="width: 12rem; text-align: center; font-size: 0.75rem; line-height: 1rem;">Prueba</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-44" style="width: 9rem; text-align: center;">Resultado</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-44" style="width: 9rem; text-align: center;">Unidad</th>
                            <th class="whitespace-nowrap sticky top-0 z-10 border-b border-gray-300 bg-gray-300 bg-opacity-75 p-2 text-center text-xs font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8 w-52" style="width: 11rem; text-align: center;">Intervalo de Referencia</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white rounded-xl">
                        <tr>
                            <td colspan="4" class=" py-2 pl-2 pr-3 text-xs font-bold text-gray-900 sm:pl-6 lg:pl-8" style="font-weight: bold;">Alveógrafo</td>
                        </tr>

                        <?php for($i=1;$i<=10;$i++): ?>
                        <tr>
                        <td class="border-b border-gray-200 p-2 text-xs font-medium text-gray-900 sm:pl-6 lg:pl-8"><?= $palabras[$i] ?></td>
                        <!-- resultado con color y flecha -->
                        <td style="text-align: center;" class="border-b border-gray-200 p-2 text-center text-xs font-medium sm:pl-6 lg:pl-8 <?= (($resultado[$i]>=$limites_inferiores[$i])&&($resultado[$i]<=$limites_superiores[$i]))?"text-green-400":"text-red-400"?>">
                            <?=$resultado[$i]?>
                            <!-- flecha o no -->
                            <?php if ($resultado[$i]<$limites_inferiores[$i]):?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            <?php elseif ($resultado[$i]>$limites_superiores[$i]):?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            <?php endif ?>
                            <!-- fin de flecha o no -->
                        </td>
                        <!-- fin de resultado con color y flecha -->
                        <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8" style="text-align: center;"><?=$unidades_medida[$i]?></td>
                        <td class="border-b border-gray-200 p-2 text-center text-xs font-medium text-gray-400 sm:pl-6 lg:pl-8" style="text-align: center;"><?=$limites_inferiores[$i]?> - <?=$limites_superiores[$i]?></td>
                        </tr>

                        <!-- titulo farinografo fila -->
                        <?php if ($i==5):?>
                            <tr>
                                <td colspan="4" class=" py-2 pl-2 pr-3 text-xs font-bold text-gray-900 sm:pl-6 lg:pl-8" style="font-weight: bold;">Farinógrafo</td>
                            </tr>
                        <?php endif ?>
                        <?php endfor ?>

                    </tbody>
                </table>
            </div>
            <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/Sistema-de-control-de-laboratorio/img/firma.jpeg" alt="Firma" class="w-32 border-b border-black mx-auto mt-4" style="margin: 1.5rem auto 0 auto; width: 100%;">
            <p class="text-center text-xs font-bold" style="font-weight: bold; text-align: center; text-decoration: overline; margin-top: 0;">Responsable</p>
        </div>
    </div>
</body>

</html>

<?php
$html=ob_get_clean();
require_once "./../libraries/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf=new Dompdf();

$options=$dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("../certificados/$id_certificado.pdf",array("Attachment"=>false));

?>