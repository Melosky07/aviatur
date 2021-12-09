<?php
include "../model/conecta.php";
include "../services/TableReader.php";

$avia_contacto = new ServicioTablaInfo($conexion);
$nit = "20042808";
// $nit = $_GET["nit"];
$con = $avia_contacto->GetContactInfo($nit);

echo json_encode(
    array(
        "data" => $con
    )
);
