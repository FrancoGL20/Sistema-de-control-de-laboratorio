<?php
    require_once("./validar_sesion_iniciada.php");
?>
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
            <h1 class="text-xl text-center font-bold mb-7">Modificar Valores de Referencia Internacionales</h1>
            <form method="post" action="">
                <!-- Valores del alveografo -->
                <h2 class="text-gray-700 text-base font-bold mb-2 mt-4 text-center">Alveógrafo</h2>
                <div class="mt-4 mb-4">
                    <label for="resistencia" class="block text-gray-700 text-sm font-bold mb-2">
                        Resistencia
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadResistencia" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hinchamiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Hinchamiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadHinchamiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="amplitud" class="block text-gray-700 text-sm font-bold mb-2">
                        Amplitud
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadAmplitud" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="hidratacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Hidratación
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadHidratacion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="humedad" class="block text-gray-700 text-sm font-bold mb-2">
                        Humedad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadHumedad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
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
                        <input type="number" step="0.01" name="unidadEsfuerzo" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="absorcion" class="block text-gray-700 text-sm font-bold mb-2">
                        Absorción
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadAbsorcion" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="estabilidad" class="block text-gray-700 text-sm font-bold mb-2">
                        Estabilidad
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadEstabilidad" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="rendimiento" class="block text-gray-700 text-sm font-bold mb-2">
                        Rendimiento
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadRendimiento" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <label for="ceniza" class="block text-gray-700 text-sm font-bold mb-2">
                        Ceniza
                    </label>
                    <div class="mt-4 flex gap-2 justify-center">
                        <input type="number" step="0.01" name="limiteInferiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Inf.">
                        <input type="number" step="0.01" name="limiteSuperiorCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Límite Sup.">
                        <input type="number" step="0.01" name="unidadCeniza" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Unidad">
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