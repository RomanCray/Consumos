<?php
include("../../Conexion/conecxion.php");

class preStrat
{
    public function __construct()
	{
	}

    public function SelectGastosG()
    {
        $objt = new concexion();

        $sql = "SELECT SUBSTRING_INDEX(FAM_NOMBRES, ' ', 1) AS PrimerNombre
        ,PD.PROD_ID
        ,PD.PROD_NOMBRE
        ,PD.PROD_CANTIDAD
        ,PD.PROD_VALOR_TOTAL
        ,CONVERT(date_format(PD.PROD_FECHA_CREACION, '%d/%m/%Y'),NCHAR) as FECHA_CREACION
        FROM producto PD
        INNER JOIN famy FA ON FA.FAM_ID = PD.ID_FAM
		WHERE PD.PROD_TIPO = 'GF'";
        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }

    public function SelectGastosGP($ID_USER)
    {
        $objt = new concexion();

        $sql = "SELECT SUBSTRING_INDEX(FAM_NOMBRES, ' ', 1) AS PrimerNombre
        ,PD.PROD_ID
        ,PD.PROD_NOMBRE
        ,PD.PROD_CANTIDAD
        ,PD.PROD_VALOR_TOTAL
        ,CONVERT(date_format(PD.PROD_FECHA_CREACION, '%d/%m/%Y'),NCHAR) as FECHA_CREACION
        FROM producto PD
        INNER JOIN famy FA ON FA.FAM_ID = PD.ID_FAM
		WHERE PD.PROD_TIPO = 'GP' AND PD.ID_FAM = $ID_USER ";
        $stmt =$objt->getConexion()->query($sql);
        return $stmt;
    }

    public function SelectGastosGPF($ID_USER)
    {
        $objt = new concexion();
        $sql = "SELECT SUBSTRING_INDEX(FAM_NOMBRES, ' ', 1) AS PrimerNombre
        ,PD.PROD_ID
        ,PD.PROD_NOMBRE
        ,PD.PROD_CANTIDAD
        ,PD.PROD_VALOR_TOTAL
        ,CONVERT(date_format(PD.PROD_FECHA_CREACION, '%d/%m/%Y'),NCHAR) as FECHA_CREACION
        FROM producto PD
        INNER JOIN famy FA ON FA.FAM_ID = PD.ID_FAM
		WHERE PD.PROD_TIPO = 'GF' AND PD.ID_FAM = $ID_USER ";
        $stmt =$objt->getConexion()->query($sql);
        return $stmt;
    }

    public function ListarPaises()
    {
        $objt = new concexion();
        $sql = "SELECT PAIS.ID_PAISES, PAIS.PAISES_NOMBRE FROM paises PAIS";
        $stmt =$objt->getConexion()->query($sql);
        return $stmt;
    }

    public function eliminar_Prod($ID_PROD)
    {
        $objt = new concexion();
        $sql = "DELETE FROM producto WHERE PROD_ID = $ID_PROD";
        $stmt =$objt->getConexion()->query($sql);
        return $stmt;
    }
}
