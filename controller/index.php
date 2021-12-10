<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/svg/logos/descarga.jfif">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
</head>

<body>
    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered bg-soft-info">
        <a href="https://www.aviatur.com/" aria-label="Front">
            <img class="navbar-brand-logo" src="../assets/svg/logos/unnamed.png" alt="Logo">
        </a>


    </header>
    <main id="content" role="main" class="main pointer-event">
        <section>


            <?php
            include "../model/conecta.php";
            include "../services/TableReader.php";
            // include "../templates/user-profile.html";

            $nit2 = $_GET["nit"];
            $nit = base64_decode($nit2);

            $cartera_con = new ServicioTablaInfo($conexion);
            $contact_info = $cartera_con->GetCustomer($nit);
            // Printing the table

            //informacion de Contacto

            $avia_contacto = new ServicioTablaInfo($conexion);
            $con = $avia_contacto->GetContactInfo($nit);
            $vec_con = sizeof($con);
            $vec = sizeof($contact_info);


            // FORMATO TABLA DE FACTURAS

            for ($i = 0; $i < $vec; $i++) {

                $cast = $contact_info[$i][5];
                if ($cast < 16) {
                    $contact_info[$i][5] = "<span class='legend-indicator bg-success'></span><FONT COLOR=#00C9A7 font-weight:bold>" . $contact_info[$i][5] . "</FONT>";
                    $contact_info[$i][0] = "<span class='bg-success'></span><FONT COLOR=#00C9A7 font-weight:bold>" . $contact_info[$i][0] . "</FONT>";
                } elseif ($cast >= 16 && $cast <= 60) {
                    $contact_info[$i][5] = "<span class='legend-indicator bg-warning'></span><FONT COLOR=#EC9A3C font-weight:bold>" . $contact_info[$i][5] . "</FONT>";
                    $contact_info[$i][0] = "<span class='bg-warning'></span><FONT COLOR=#EC9A3C font-weight:bold>" . $contact_info[$i][0] . "</FONT>";
                } else {
                    $contact_info[$i][5] = "<span class='legend-indicator bg-danger'></span><FONT COLOR=#ED4C78 font-weight:bold>" . $contact_info[$i][5] . "</FONT>";
                    $contact_info[$i][0] = "<span class='bg-danger'></span><FONT COLOR=#ED4C78 font-weight:bold>" . $contact_info[$i][0] . "</FONT>";
                }
            }

            for ($i = 0; $i < $vec; $i++) {
                $vec2 = sizeof($contact_info[$i]);
                for ($j = 0; $j < $vec2; $j++) {
                    if ($j < 1) {
                        $contact_info[$i][$j] = "<tr><th>" . $contact_info[$i][$j] . "</th>";
                    } elseif ($j == 5) {
                        $contact_info[$i][$j] = "<th>" . $contact_info[$i][$j] . "</th></tr>";
                    } else {
                        $contact_info[$i][$j] = "<th>" . $contact_info[$i][$j] . "</th>";
                    }
                }
            }
            // FIN FORMATO TABLA FACTURAS

            //FORMATO TABLA DE RESUMEN 
            for ($i = 0; $i < $vec_con; $i++) {
                $vec2_con = sizeof($con[$i]);
                for ($j = 0; $j < $vec2_con; $j++) {
                    if ($j < 1) {
                        $enco = base64_encode($con[$i][$j]);
                        $con[$i][$j] = "<tr><th>" . $enco . "</th>";
                    } elseif ($j == 5) {
                        $con[$i][$j] = "<th>" . $con[$i][$j] . "</th></tr>";
                    } else {
                        $con[$i][$j] = "<th>" . $con[$i][$j] . "</th>";
                    }
                }
            }
            // FIN FORMATO TABLA RESUMEN

            ?>
            <section>
                <!-- TABLA RESUMEN INICIO -->
                <table id="contacto" class="table is-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nit</th>
                            <th>Razon social</th>
                            <th>Contacto</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php  //------------------INYECCION DE DATOS--------------

                        for ($i = 0; $i < $vec_con; $i++) {
                            $vec2_con = sizeof($con[$i]);
                            for ($j = 0; $j < $vec2_con; $j++) {
                                print_r($con[$i][$j]);
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nit</th>
                            <th>Razon social</th>
                            <th>Contacto</th>
                            <th>Correo</th>
                        </tr>
                    </tfoot>
                </table>
            </section>
                        <!-- FIN TABLA RESUMEN INICIO -->


            <!-- TABLA DE FACTURAS INICIO -->
            <section>
                <table id="facturas" class="table is-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Factura</th>
                            <th>Fecha</th>
                            <th>Moneda</th>
                            <th>Saldo</th>
                            <th>Motivo</th>
                            <th>Dias</th>
                            <!-- <th>Documento</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php  //------------------INYECCION DE DATOS--------------

                        for ($i = 0; $i < $vec; $i++) {
                            for ($j = 0; $j < 6; $j++) {
                                print_r($contact_info[$i][$j]);
                            }
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Factura</th>
                            <th>Fecha</th>
                            <th>Moneda</th>
                            <th>Saldo</th>
                            <th>Motivo</th>
                            <th>Dias</th>
                            <!-- <th>Documento</th> -->
                        </tr>
                    </tfoot>
                </table>
            </section>
            <!-- TABLA DE FACTURAS INICIO -->
    </main>


    <footer class="modal-footer justify-content-lg-end bg-soft-info">

        <div class="d-flex justify-content-end">

            <li class="list-inline-item">
                <!-- Keyboard Shortcuts Toggle -->

                <a class="js-hs-unfold-invoker" data-hs-unfold-options='{
                          "target": "#keyboardShortcutsSidebar",
                          "type": "css-animation",
                          "animationIn": "fadeInRight",
                          "animationOut": "fadeOutRight",
                          "hasOverlay": true,
                          "smartPositionOff": true
                         }' href="https://www.aviatur.com/"><img class="navbar-brand-logo" src="../assets/svg/logos/unnamed.png" alt="Logo">
                </a>

                <!-- End Keyboard Shortcuts Toggle -->
            </li>
        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contacto').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "filter": false
            });
        });
        $(document).ready(function() {
            var table = $('#facturas').DataTable();

            $('#facturas tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        });
    </script>
</body>

</html>