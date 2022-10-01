<?php

include("../Templates/Header.php");

?>
<!-- Estilos propios -->
<link href="../../Complements/css/Estiles.css" rel="stylesheet">

<label hidden value="q" id="Pg_var">Page_<?php echo $page_ubi ?></label>

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid fw-lighter">

        <h2 class="text-center txt_Tgg"></h2>
        <hr class="sidebar-divider">

        <div class="card bg-transparent mb-3" style="max-width: 100%; border: 1px dashed white;" id="top_image">
            <div class="row g-0">
                <div class="col-md-3" id="Topimage" style="overflow: hidden;">
                    <img src="../../Complements/imagenes/<?php echo $us_imagen; ?>" class="img-fluid rounded-start" style="padding: 5px 5px 5px 5px; 
                                            border-radius: 50%;
                                            height:100%;                                            
                                            width:100%;
                                            border: 1px dashed #205375;                                        
                                            transition: 2s;" alt="ERROR! al cargar la imagen">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class=" text-center">HOLA! <?php echo $partesN[1]; ?> </h5>
                        <p class="text-center" style="height: 100%;">
                            Este es el sistema de registro de gastos de la familia
                            En este modulo tu podrás ingresar información de los gastos
                            que realices para la casa y tus gastos personales así que ¡ADELANTE!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="sidebar-divider">
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="h3 mb-2 text-800 txt_Tgg1"></h5>
                <p class="mb-4 txt_Gg"></p>
                <p class="text-right txt_Rgg"></p>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="mydatatable-container">
                    <table class="records_list table table-bordered tbl_p" id="mydatatable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="th_tr1">
                                <th>N#</th>
                                <th>USUARIO</th>
                                <th>FECHA</th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="dts_table align-middle">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- ************************************************************************************************** -->

<!-- Scripts propios -->

<script src="../../Complements/js/PreStart.js"></script>

<!-- Apis Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
<script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.js"></script>

<?php

include("../Templates/Footer.php");

?>