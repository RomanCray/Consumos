<?php

include("../Consultas/productos_csts.php");

switch ($_POST["NombreFuncionOp"]) {

    case 'saveProductos':

        $objt = new productos();

        $nombre_prod = strtoupper($_POST["nombre_prod"]);
        $cantidad_prod = $_POST["cantidad_prod"];
        $precio_prod = $_POST["precio_prod"];
        $direccion_prod = $_POST["direccion_prod"];
        $comentario_prod = $_POST["comentario_prod"];
        $tipoG_prod = $_POST["tipoG_prod"];
        $Usuario = $_POST["Usuario"];
        $pre_Unit = $_POST["pre_Unit"];

        $resp = $objt->saveProductos($Usuario, $tipoG_prod, $nombre_prod, $cantidad_prod, $precio_prod, $direccion_prod, $comentario_prod, $pre_Unit);
        echo $resp;

        break;
    case 'selectEditProductos':

        $objt = new productos();

        $Usuario = strtoupper($_POST['Usuario']);
        $ID_prod = strtoupper($_POST['ID_prod']);

        $resp = $objt->selectEditProductos($Usuario, $ID_prod);
        $row = mysqli_fetch_assoc($resp);

        echo json_encode($row);
        break;

    case 'editProductos':

        $objt = new productos();

        $nombre_prod = strtoupper($_POST["nombre_prod"]);
        $cantidad_prod = $_POST["cantidad_prod"];
        $precio_prod = $_POST["precio_prod"];
        $direccion_prod = $_POST["direccion_prod"];
        $comentario_prod = $_POST["comentario_prod"];
        $tipoG_prod = $_POST["tipoG_prod"];
        $Usuario = $_POST["Usuario"];
        $pre_Unit = $_POST["pre_Unit"];
        $ID_PRO = $_POST["ID_PRO"];

        $resp = $objt->editProductos($ID_PRO,$Usuario, $tipoG_prod, $nombre_prod, $cantidad_prod, $precio_prod, $direccion_prod, $comentario_prod, $pre_Unit);   
        echo $resp;

        break;
}
