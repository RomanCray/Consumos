<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js"></script>
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>


<?php

session_start();

define('CLAVE', '6LdVqnIbAAAAALtOMGDF9q51BYScHVOEk9Bvq0_W');

$token = $_POST['token'];
$action = $_POST['action'];

$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($cu, CURLOPT_POST, 1);
curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cu);
curl_close($cu);

$datos = json_decode($response, true);

if ($datos['success'] == 1 && $datos['score'] >= 0.6) {

    if ($datos['action'] == 'validarUsuario') {

        if (trim($_POST['email']) != "" && ($_POST['pass']) != "") {

            $_SESSION['nombreCompleto'] = $_POST['nombreCompleto'];
            $_SESSION['ID_usuario'] = $_POST['ID_usuario'];
            $_SESSION['us_imagen'] = $_POST['us_imagen'];

            $id = $_POST['ID_usuario'];
            include("conecxion.php");
            $objt = new concexion();            

            $sql = "INSERT INTO INGRESO
                    (IN_FECHA_CREACION
                    ,US_ID)
                    VALUES
                    (NOW(),
                    $id)";

            $stmt = $objt->getConexion()->query($sql);
                        
            if ($stmt == 1) {
                header('Location:../View/Content/home.php?val_page=home');
            }
            
        } else {
            echo "<script>alert('Debe ingresar Usuario y Contraseña');window.location.href='../View/Templates/Login.php';</script>";
        }
    }
} else {
    echo "<script>alert('ERES UN ROBOT');window.location.href='../View/Templates/Login.php';</script>";
}
