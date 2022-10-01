<?php
include("../../Conexion/conecxion.php");

class consultas
{
    public function __construct()
	{
	}

    public function validarUsers($email,$pasword){    
        
        $objt = new concexion();

        $sql = "SELECT CONCAT(FA.FAM_NOMBRES, ' ' , FA.FAM_APELLIDOS) AS NOM_COMP,
        FAM_ID,
        FAM_IMAGEN
        FROM FAMY FA
        INNER JOIN USUARIOS US ON US.ID_FAM = FA.FAM_ID
        WHERE US.US_NOMBRE_USER = '$email ' AND US.US_PASSWORD = '$pasword'"; 
               
        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }
}