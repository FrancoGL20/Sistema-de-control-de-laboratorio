<?php 
session_start();
require_once("./validar_inicio_sesion.php");
?>
<h1>Inicio de sesion</h1>
<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Usuario: </label>
    <input type="text" autocomplete="username" id="username" name="username"><br>
    <label for="password">Contraseña: </label>
    <input type="text" autocomplete="password" id="password" name="password"><br>
    <input type="submit" value="Iniciar sesión">
</form>