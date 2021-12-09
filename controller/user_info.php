<?php
include "../model/conecta.php";
include "../services/TableReader.php";

$avia_contacto = new ServicioTablaInfo($conexion);
$nit = "860056785";
// $nit = $_GET["nit"];
$con = $avia_contacto->GetContactInfo($nit);

echo json_encode(
    array(
        "data" => $con
    )
);
