<?php

require_once("../config/config.php");
/**
 * devuelve número de registros 
 * existentes del parametro enviado
 */
function numeroRegistrosCon(string $query){
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        $result = mysqli_query($con, $query);
        $n_productos=mysqli_num_rows($result);
        // cerrar conexión
        mysqli_close($con);
        return $n_productos;
    }
}
/**
 * devuelve un arreglo con el resultado
 * del query enviado
 */
function hacerConsulta(string $query){
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        $result = mysqli_query($con, $query);
        $n_productos=mysqli_num_rows($result);
        // cerrar conexión
        $arreglo_de_resultados=[];
        while ($row = mysqli_fetch_array($result)):
            array_push($arreglo_de_resultados,$row);
        endwhile;
        mysqli_close($con);
        return $arreglo_de_resultados;
    }
}
/**
 * hace la ejecución de un query
 * y devuelve true si todo salió bien
 */
function ejecutarQuery(string $query){
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        $result = mysqli_query($con, $query);
        
        // cerrar conexión
        mysqli_close($con);
        return $result;
    }
}
/**
 * obtiene el ultimo id insertado
 * en la DB
 */
function insertarYObtenerUltimoIdIsertado(string $query){
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        mysqli_query($con, $query);
        $id = mysqli_query($con, "SELECT LAST_INSERT_ID();");
        $iddos = $id->fetch_array(MYSQLI_NUM);
        $result=$iddos[0];

        // cerrar conexión
        mysqli_close($con);
        return $result;
    }
}
