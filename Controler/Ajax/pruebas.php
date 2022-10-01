<?php

include("../../Conexion/conecxion.php");
$objt = new concexion();


$db = new mysqli("localhost", "root", "admin", "prb2");
            // Check connection
            if ($db->connect_errno) {
                die("error de conexión: " . mysqli_connect_error());
            }

            // ejecutando una consulta simple
            $consulta = $db->query("select * from paises");
            while ($row = mysqli_fetch_assoc($consulta)) {
                echo $row["paises_nombre"] . "<br />";
            }

            $conn =$objt->getConexion()->query("select * from paises");            
            while ($row1 = mysqli_fetch_assoc($conn)) {
                echo $row1["paises_nombre"] . "<br />";
            }


            echo "*********************************************************";
            var_dump($objt);
            echo "/////////////////////////////////////////////////////////";
            var_dump($conn);            
            echo "*********************************************************";
            echo "Total: " . $consulta->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

