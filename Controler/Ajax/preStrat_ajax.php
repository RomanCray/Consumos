<?php

include("../Consultas/preStart_csts.php");

switch ($_POST["NombreFuncionOp"]) {    

    case 'SelectGastosG':

        $objt = new preStrat();

        $arr = array();
        $resp = $objt->SelectGastosG();
        $cont = 0;
        $sumaV = 0;

        while ($row1 = mysqli_fetch_assoc($resp)) {
            $arr[$cont++] = [$row1['PrimerNombre'], $row1['PROD_ID'], $row1['PROD_NOMBRE'], $row1['PROD_CANTIDAD'], $row1['PROD_VALOR_TOTAL'], $row1['FECHA_CREACION']];
        }
        echo json_encode($arr);
        break;

    case 'SelectGastosGP':

        $objt = new preStrat();

        $arr = array();
        $resp = $objt->SelectGastosGP($_POST["ID_USER"]);
        $cont = 0;
        $sumaV = 0;

        while ($row1 = mysqli_fetch_assoc($resp)) {
            $arr[$cont++] = [$row1['PrimerNombre'], $row1['PROD_ID'], $row1['PROD_NOMBRE'], $row1['PROD_CANTIDAD'], $row1['PROD_VALOR_TOTAL'], $row1['FECHA_CREACION']];
        }
        echo json_encode($arr);
        break;
    case 'SelectGastosGPF':

        $objt = new preStrat();

        $arr = array();
        $resp = $objt->SelectGastosGPF($_POST["ID_USER"]);
        $cont = 0;
        $sumaV = 0;

        while ($row1 = mysqli_fetch_assoc($resp)) {
            $arr[$cont++] = [$row1['PrimerNombre'], $row1['PROD_ID'], $row1['PROD_NOMBRE'], $row1['PROD_CANTIDAD'], $row1['PROD_VALOR_TOTAL'], $row1['FECHA_CREACION']];
        }
        echo json_encode($arr);
        break;

    case 'ListarPaises':

        $objt = new preStrat();

        $arr = array();
        $resp = $objt->ListarPaises();
        $cont = 0;
        while ($row = mysqli_fetch_assoc($resp)) {
            $arr[$cont++] = [$row['ID_PAISES'], $row['PAISES_NOMBRE']];
        }
        echo json_encode($arr);
        break;

    case 'eliminar_Prod':

        $objt = new preStrat();

        $ID_PROD = strtoupper($_POST['ID_PROD']);        

        $resp = $objt->eliminar_Prod($ID_PROD);
        echo $resp;
        break;
}
