<?php
include "../model/conecta.php";
include "../services/TableReader.php";

$avia_contactos = new ServicioTablaInfo($conexion);
// $nit = "860056785";
$nit = $_GET["nit"];
$contact_info = $avia_contactos->GetCustomer($nit);
// Printing the table
$vec = sizeof($contact_info);
$dato_final[] = array();

//Adding category colum to the table

for ($i = 0; $i < $vec; $i++) {

    $cast = $contact_info[$i][5];
    if ($cast < 16) {
        $contact_info[$i][5] = "<td><span class='legend-indicator bg-success'></span><FONT COLOR=#00C9A7 font-weight:bold>" . $contact_info[$i][5] . "</FONT></td></tr>";
        $contact_info[$i][0] = "<td><span class='bg-success'></span><FONT COLOR=#00C9A7 font-weight:bold>" . $contact_info[$i][0] . "</FONT></td></tr>";
    } elseif ($cast >= 16 && $cast <= 60) {
        $contact_info[$i][5] = "<td><span class='legend-indicator bg-warning'></span><FONT COLOR=#EC9A3C font-weight:bold>" . $contact_info[$i][5] . "</FONT></td></tr>";
        $contact_info[$i][0] = "<td><span class='bg-warning'></span><FONT COLOR=#EC9A3C font-weight:bold>" . $contact_info[$i][0] . "</FONT></td></tr>";
    } else {
        $contact_info[$i][5] = "<td><span class='legend-indicator bg-danger'></span><FONT COLOR=#ED4C78 font-weight:bold>" . $contact_info[$i][5] . "</FONT></td></tr>";
        $contact_info[$i][0] = "<td><span class='bg-danger'></span><FONT COLOR=#ED4C78 font-weight:bold>" . $contact_info[$i][0] . "</FONT></td></tr>";
    }
}

echo json_encode(
    array(
        "data" => $contact_info
    )
);
// header("Location: ../views/usuario.php");