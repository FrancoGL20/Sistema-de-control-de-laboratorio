<?php
    require_once("./validar_sesion_iniciada.php");
?>
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
            <form method="post" action="">
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
                        Estado
                    </label>
                    <select name="estado" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" required>
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactivo</option>
                        <option value="3">Baja</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre
                    </label>
                    <input type="text" name="nombre" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Panes López" required>
                </div>
                <div class="mb-4">
                    <label for="domicilio" class="block text-gray-700 text-sm font-bold mb-2">
                        Domicilio
                    </label>
                    <textarea name="domicilio" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Av. Avenida #1" cols="30" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="rfc" class="block text-gray-700 text-sm font-bold mb-2">
                        RFC
                    </label>
                    <input type="text" name="rfc" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="RTQW876542WE" required>
                </div>
                <div class="mb-4">
                    <label for="nombre de contacto" class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre de Contacto
                    </label>
                    <input type="text" name="nombreContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Martín Hernández" required>
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo
                    </label>
                    <input type="email" name="correo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="correocontacto@gmail.com" required>
                </div>
                <div class="mb-4">
                    <label for="puesto del contacto" class="block text-gray-700 text-sm font-bold mb-2">
                        Puesto del Contacto
                    </label>
                    <input type="text" name="puestoContacto" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="CEO" required>
                </div>
                <div>
                    <h1 class="text-gray-700 text-sm font-bold mb-2">Valores de referencia</h1>
                    <div>
                        <input type="radio" id="hide" name="valoresRef" value="ValoresReferenciaInternacionales" checked />
                        <label for="valores de referencia internacionales" class="text-gray-700 text-xs font-bold mb-2">Valores de Referencia Internacionales</label>
                    </div>
                    <div>
                        <input type="radio" id="show" name="valoresRef" value="ValoresRefernciaPropios" />
                        <label for="valores de referencia propios" class="text-gray-700 text-xs font-bold mb-2">Valores de Referencia Propios</label>
                    </div>
                </div>
                <div class="hidden" id="box">
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-4 text-center">Alveógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                            Resistencia
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Hinchamiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                            Amplitud
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                            Hidratación
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                            Humedad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <!-- Valores del farinografo -->
                    <h2 class="text-gray-700 text-base font-bold mb-2 mt-7 text-center">Farinógrafo</h2>
                    <div class="mt-4 mb-4">
                        <label for="esfuerzo" class="block text-gray-700 text-sm font-bold mb-2">
                            Esfuerzo
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                            Absorción
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                            Estabilidad
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                            Rendimiento
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                            Ceniza
                        </label>
                        <div class="mt-4 flex gap-2 justify-center">
                            <input type="number" name="limiteInferiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                            <input type="number" name="limiteSuperiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-10">
                    <button type="submit" name="altaCliente" class="bg-slate-500 hover:bg-psipeDarkGray text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Dar de Alta
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/valoresRef.js"></script>
</body>
</html>