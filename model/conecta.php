<?php

$hostname = "localhost";
$database = "carterafacil";
$username = "root";
$password = "";

try {
    $conexion = mysqli_connect($hostname, $username, $password);
    $conexion = new mysqli($hostname, $username, $password, $database);            

} catch (Exception $th) {
    throw new Exception("<p><h1>!!!Conexion fallida!!! " . $th->getMessage() . "</h1></p>", 1);
    // echo "Error encontrado: " . $th->getMessage();
    return $th;
    exit();
}
