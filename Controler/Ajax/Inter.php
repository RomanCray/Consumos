<?php

include("../Consultas/ConsultasSqlSrv.php");

switch ($_POST["NombreFuncionOp"]) {    

    case 'validarUsers':

        $objt = new consultas();

        $email = strtoupper($_POST['email']);
        $pass = strtoupper($_POST['pass']);

        $resp = $objt->validarUsers($email, $pass);
        $row = mysqli_fetch_assoc($resp);  
        echo json_encode($row);
        break;    
}
