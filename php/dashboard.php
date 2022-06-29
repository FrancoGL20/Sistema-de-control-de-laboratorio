<?php 
    require_once("./validar_sesion_iniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <?php require_once("./navbar.php"); ?> 
    </head>
    <body class="background">
        
        <!-- Contenedor Principal -->
        <div class="p-10 flex flex-col items-center space-y-20">
            <h1 class="text-center text-3xl mt-14"><b>Sistema de Control de Laboratorio</b></h1>
            <div class="flex flex-wrap gap-7 justify-center">
                
                <!-- Usuarios -->
                <?php if($_SESSION['sesion']['tipo']==3): ?>
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 rounded-t-xl" src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80" alt="Un hombre trabajando en su computadora sobre un escritorio, acompanado de su taza de cafe">
                    <h2 class="text-xl font-bold">Usuarios</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./alta-usuarios.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Alta
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./modificar-usuarios.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Modificación/Baja
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif;?>

                <!-- Clientes -->
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 rounded-t-xl" src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1184&q=80" alt="Clientes conversando en una mesa">
                    <h2 class="text-xl font-bold">Clientes</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./alta-clientes.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Alta
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./modificar-clientes.php" class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Modificación/Baja
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./consultar-clientes.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Consultar datos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Equipo de laboratorio -->
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 rounded-t-xl" src="https://images.unsplash.com/photo-1614308457932-e16d85c5d053?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Equipo de laboratorio sobre una mesa">
                    <h2 class="text-xl font-bold">Equipo Laboratorio</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./alta-equipo-laboratorio.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Alta
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./modificar-equipo-laboratorio.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Modificación/Baja
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./consultar-equipo-laboratorio.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Consultar datos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Lotes -->
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 rounded-t-xl" src="https://images.unsplash.com/photo-1646430710398-9cfab77621c3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="Granja y silos de harina">
                    <h2 class="text-xl font-bold">Lotes</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./alta-lotes.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Alta (con análisis inicial)
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./modificar-lotes.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Modificación
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./consultar-lotes.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Consultar datos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Análisis -->
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 rounded-t-xl" src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" alt="Hoja de una análisis con una gráfica">
                    <h2 class="text-xl font-bold">Análisis</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./alta-analisis.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Alta
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./modificar-valores-referencia.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Valores de referencia
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./consultar-analisis.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Consultar datos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Certificados -->
                <div class="w-60 h-[22rem] bg-blue bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-2xl backdrop-blur-sm rounded-xl flex flex-col items-center space-y-4">
                    <img class="w-60 h-40 rounded-t-xl" src="https://images.unsplash.com/photo-1589330694653-ded6df03f754?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1516&q=80" alt="Certificado firmado">
                    <h2 class="text-xl font-bold">Certificados</h2>
                    <div class="">
                        <ul class="space-y-3">
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./crear-certificado.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Creación
                                </a>
                            </li>
                            <li class="hover:underline underline-offset-2 decoration-slate-50 decoration-2">
                                <a href="./consultar-certificados.php" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                                    </svg>
                                    Consulta e impresión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>