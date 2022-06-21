<?php 
    session_start();
    require_once("./validar_inicio_sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href="../styles.css">
        <link rel="shortcut icon" href="https://harinaselizondo.com/wp-content/uploads/2017/03/Favicon.png">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    </head>
    <body class="background">
        <!-- Navbar -->
        <nav class="bg-gradient-to-br from-blue-50/50 to-blue-300/50 shadow-md backdrop-blur-sm sticky top-0 z-10">
            <div class="px-3 mx-auto">
                <div class="flex justify-between">
                    <!-- Recordar agrupar en contenedores las cosas que queremos que vayan del lado izquierdo y derecho -->
                    <!-- Lado izquierdo -->
                    <div class="flex space-x-4">
                        <!-- Logo -->
                        <a href="./dashboard.php" class="flex items-center py-3 px-2 text-gray-200 divide-x divide-black">
                            <img src="../img/logoHarinasElizondo.png" class="w-24 mx-1">
                        </a>
                        <!-- Nav lado izquierdo, si se desea -->
                        <!-- <div class="hidden md:flex items-center space-x-1">
                            <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Features</a>
                            <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Pricing</a>
                        </div> -->
                    </div>
                    <!-- Lado derecho -->
                    <div class="hidden lg:flex items-center space-x-1">
                        <!-- <a class="rounded p-2 hover:bg-blue-50 transition duration-500 text-black" href="./index.html">Inicio</a> -->
                        <!-- Dropdown button 1 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn hover:bg-blue-50 transition duration-500 text-black" id="dropBtn">
                                Usuarios
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown">
                                <a href="./alta-usuarios.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Alta</a>
                                <a href="./modificar-usuarios.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Modificación/Baja</a>
                            </div>
                        </div>
                        <!-- Dropdown button 2 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn2 hover:bg-blue-50 transition duration-500 text-black" id="dropBtn2">
                                Clientes
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown2">
                                <a href="./alta-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Alta</a>
                                <a href="./modificar-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Modificación/Baja</a>
                                <a href="./consultar-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Consultar</a>
                            </div>
                        </div>
                        <!-- Dropdown button 3 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn3 hover:bg-blue-50 transition duration-500 text-black" id="dropBtn3">
                                Equipo de Laboratorio
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown3">
                                <a href="./alta-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Alta</a>
                                <a href="./modificar-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Modificación/Baja</a>
                                <a href="./consultar-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Consultar</a>
                            </div>
                        </div>
                        <!-- Dropdown button 4 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn4 hover:bg-blue-50 transition duration-500 text-black" id="dropBtn4">
                                Lotes
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown4">
                                <a href="./alta-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Alta</a>
                                <a href="./modificar-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Modificación</a>
                                <a href="./consultar-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Consultar</a>
                            </div>
                        </div>
                        <!-- Dropdown button 5 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn5 hover:bg-blue-50 transition duration-500 text-black" id="dropBtn5">
                                Análisis
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown5">
                                <a href="./alta-analisis.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Alta</a>
                                <a href="./modificar-valores-referencia.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Valores de referencia</a>
                                <a href="./consultar-analisis.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Consultar</a>
                            </div>
                        </div>
                        <!-- Dropdown button 6 -->
                        <div class="flex flex-col overflow-visible float-right items-start">
                            <button class="rounded p-2 dropBtn6 hover:bg-blue-50 transition duration-500 text-black" id="dropBtn6">
                                Certificados
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div class="text-sm bg-gradient-to-br from-slate-50 to-slate-300 hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown6">
                                <a href="./crear-certificado.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Creación</a>
                                <a href="./consultar-certificados.php" class="rounded px-2 py-1 hover:bg-blue-50 duration-500 text-black">Consulta <br/>e impresión</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile button -->
                    <div class="lg:hidden flex items-center">
                        <button class="mobile-menu-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="mobile-menu hidden lg:hidden p-1">
                <!-- <a href="./index.html" class="text-center block rounded hover:bg-blue-50 py-2 px-2 duration-500 text-black">Inicio</a> -->
                <!-- Dropdown button 1-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM hover:bg-blue-50 text-black duration-500" id="dropBtnM">
                        Usuarios
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM">
                        <a href="./alta-usuarios.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Alta</a>
                        <a href="./modificar-usuarios.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Modificación/Baja</a>
                    </div>
                </div>
                <!-- Dropdown button 2-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM2 hover:bg-blue-50 text-black duration-500" id="dropBtnM2">
                        Clientes
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM2">
                        <a href="./alta-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Alta</a>
                        <a href="./modificar-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Modificación/Baja</a>
                        <a href="./consultar-clientes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Consultar</a>
                    </div>
                </div>
                <!-- Dropdown button 3-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM3 hover:bg-blue-50 text-black duration-500" id="dropBtnM3">
                        Equipo de Laboratorio
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM3">
                        <a href="./alta-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Alta</a>
                        <a href="./modificar-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Modificación/Baja</a>
                        <a href="./consultar-equipo-laboratorio.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Consultar</a>
                    </div>
                </div>
                <!-- Dropdown button 4-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM4 hover:bg-blue-50 text-black duration-500" id="dropBtnM4">
                        Lotes
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM4">
                        <a href="./alta-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Alta</a>
                        <a href="./modificar-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Modificación</a>
                        <a href="./consultar-lotes.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Consultar</a>
                    </div>
                </div>
                <!-- Dropdown button 5-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM5 hover:bg-blue-50 text-black duration-500" id="dropBtnM5">
                        Análisis
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM5">
                        <a href="./alta-analisis.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Alta</a>
                        <a href="./modificar-valores-referencia.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Valores de referencia</a>
                        <a href="./consultar-analisis.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Consultar</a>
                    </div>
                </div>
                <!-- Dropdown button 6-->
                <div class="text-center flex flex-col">
                    <button class="rounded p-2 m-1 dropBtnM6 hover:bg-blue-50 text-black duration-500" id="dropBtnM6">
                        Certificados
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="bg-gradient-to-br from-slate-50/50 to-slate-300/50 hidden flex-col m-1 rounded text-sm" id="dropdownM6">
                        <a href="./crear-certificado.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Creación</a>
                        <a href="./consultar-certificados.php" class="rounded px-2 py-1 hover:bg-blue-50 text-black duration-500">Consulta e impresión</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fin de navbar -->
        <!-- JavaScript -->
        <script src="../js/main.js" ></script>
    </body>
</html>