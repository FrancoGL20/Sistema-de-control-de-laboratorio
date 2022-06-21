<?php

require_once("../config/config.php");
function hacerConsulta(string $query){
    $con = mysqli_connect(HOST, USER, PASSWORD, DB);
    
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        $result = mysqli_query($con, $query);
        $n_productos=mysqli_num_rows($result);
        $arreglo_de_resultados=mysqli_fetch_array($result);
        // cerrar conexión
        mysqli_close($con);
        return ["numero"=>$n_productos,"resultado"=>$arreglo_de_resultados];
    }
}
function hacerInsercion(string $query){
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

// foreach (mysqli_fetch_array($result) as $row) {
    
// }