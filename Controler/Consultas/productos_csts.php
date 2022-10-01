<?php
include("../../Conexion/conecxion.php");

class productos
{
    public function __construct()
	{
	}
    
    public function ListarPaises()
    {

        $objt = new concexion();
        $sql = "SELECT PAIS.ID_PAISES, PAIS.PAISES_NOMBRE FROM paises PAIS";
        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }

    public function saveProductos($Usuario, $tipoG_prod, $nombre_prod, $cantidad_prod, $precio_prod, $direccion_prod, $comentario_prod, $pre_Unit)
    {
        $objt = new concexion();
        $sql = "INSERT INTO producto
        (PROD_FECHA_CREACION   
        ,ID_FAM        
        ,PROD_NOMBRE
        ,PROD_CANTIDAD
        ,PROD_VALOR_UNIT
        ,PROD_VALOR_TOTAL
        ,PROD_UBICACION
        ,PROD_COMENTARIO
        ,PROD_ESTADO
        ,PROD_TIPO)
  VALUES
        (NOW(),
		$Usuario,
		'$nombre_prod',
		'$cantidad_prod',
        '$pre_Unit',
		'$precio_prod',
        '$direccion_prod',
        '$comentario_prod', 
		'A',
		'$tipoG_prod')";

        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }

    public function selectEditProductos($Usuario, $ID_prod)
    {
        $objt = new concexion();
        $sql = "SELECT PD.PROD_TIPO, PD.PROD_NOMBRE, PD.PROD_CANTIDAD, PD.PROD_VALOR_TOTAL,
        PD.PROD_COMENTARIO,PD.PROD_UBICACION
        FROM producto PD
        WHERE PD.PROD_ID = $ID_prod AND PD.ID_FAM = $Usuario";
        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }

    public function editProductos($ID_PRO, $Usuario, $tipoG_prod, $nombre_prod, $cantidad_prod, $precio_prod, $direccion_prod, $comentario_prod, $pre_Unit)
    {
        $objt = new concexion();

        $sql = "UPDATE producto
                SET PROD_FECHA_MODIFICACION = NOW()
                ,ID_FAM = '$Usuario'
                ,PROD_NOMBRE = '$nombre_prod'
                ,PROD_CANTIDAD = '$cantidad_prod'
                ,PROD_VALOR_UNIT = '$pre_Unit'
                ,PROD_VALOR_TOTAL = '$precio_prod'
                ,PROD_UBICACION = '$direccion_prod'
                ,PROD_COMENTARIO = '$comentario_prod'
                ,PROD_TIPO = '$tipoG_prod'
            WHERE PROD_ID = $ID_PRO";        

        $stmt = $objt->getConexion()->query($sql);
        return $stmt;
    }
}
