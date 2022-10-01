<?php

class concexion
{

   public function getConexion()
    {
        /* ************************ CONEXION CON MYSQL *********************** */
        /*Forma 1 de conectarse a una base de datos

        $enlace = mysqli_connect("127.0.0.1","root","","conlyne");
        */

        /*Froma 2 de conectarse a una base de datos
        $pdo = new PDO(
            'mysql:host=localhost;dbname=conlyne',
            'root',
            '');
        */
        $enlace = new mysqli("localhost", "root", "admin", "prb2");
        return $enlace;

        /* ************************ CONEXION CON SQL SERVER *********************** */
        /* ------------------- Para autentificacion de Windows ---------------------*/

        // $serverName = "ROMANCRAY\SQLEXPRESS";
        // $connectionInfo = array("Database" => "BD_CONTROL_CONSUMO");
        // $conn = sqlsrv_connect($serverName, $connectionInfo);
        // return $conn;        
    }

    // $link= getConexion();
}