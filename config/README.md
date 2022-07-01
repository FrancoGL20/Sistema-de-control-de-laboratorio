# ¿Qué es config?
Es un directorio con las configuraciones personales de accesibilidad que pueden cambiar entre usuarios:
- contiene url de la ubicación del sistema en el servidor
- contraseñas de la base de datos usada
- contraseñas de la cuenta de gmail usada para enviar correos (ver notas en el ejemplo comentado)

<!-- Estructura vacia del config.php (llenar para usar) -->
<!--

// url mostrada al entrar al sistema al sistema
// este es un ejemplo
$url="http://localhost/sistema-de-control-de-laboratorio";

// contraseñas de la base de datos local
define('HOST', '');
define('USER', '');
define('PASSWORD', "");
define('DB', '');

// gmail
// se obtiene la contraseña con verificación en 2 pasos y despues crear una contraseña para una app
// https://youtu.be/RpSQQIGTpTM
define('CORREO', '');
define('CONTRACORREO', '');

-->