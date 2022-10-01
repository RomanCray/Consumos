<?php

include("../Templates/Header.php");

?>
<!-- Estilos propios -->
<link href="../../Complements/css/Estiles.css" rel="stylesheet">

<label hidden id="Pg_var">Page_<?php echo $page_ubi; ?></label>


<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid fw-lighter">

        <h3 class=" text-center">Ingresa tus productos <?php echo ucwords(strtolower($partesN[1])); ?> </h3>
        <hr>
        <br>

        <form class="user" id="" action="" method="POST">
        <span id="st_pord"><br>
        <br> </span>
               
            <div class="form-group row">
                <div class="col-sm-2 mb-3 mb-sm-0">
                </div>
                <div class="col-sm-8 mb-3">                
                    <div class="attr-conteiner_select">
                        <div class="attr-srch_select_box">
                            <div class="attr-srch_select_select">
                                <span>--SELECCIONE--</span>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="attr-srch_select_conteiner_options">
                                <div class="attr-select_search">
                                    <i class="bi bi-search"></i>
                                    <input type="text" class="search_select" id="search_select" placeholder="Buscar">
                                </div>
                                <ul class="attr-srch_select_options">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <label hidden id="tipoG_prod"></label>

                </div>
                <div class="col-sm-2 mb-3">
                </div>
            </div>
            <div id="cls_btns">
            <span id="st_pord1"></span>
                <div class="form-group row ">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="nombre_prod" placeholder="* Nombre del Producto" required>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <input type="number" class="form-control form-control-user" id="cantidad_prod" placeholder="* Cantidad" required>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <input type="decimal" class="form-control form-control-user" id="precio_prod" placeholder="* Precio en dolares $" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <textarea class="form-control form-control-user polcss" id="direccion_prod" placeholder="Direccion de la compra"></textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <textarea class="form-control form-control-user polcss" id="comentario_prod" placeholder="Comentario"></textarea>
                    </div>
                </div>
                <button type="submit" id="enviar_dts" style="width: 100%;"></button>
            </div>            
        </form>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- ************************************************************************************************** -->

<!-- Scripts propios -->

<script src="../../Complements/js/Productos.js"></script>
<script src="../../Complements/js/validaciones.js"></script>

<?php

include("../Templates/Footer.php");

?>