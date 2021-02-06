<?php

/**
 *
 */
class DashboardModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MYSQLdb();
    }

    /**
     * Función para obtener los gastos
     */
    public function mdlGetGastos()
    {
        $data = $this->db->query("SELECT * FROM gastos");
        return $data;
    }

    //obtener el tipo de gasto, para rellenar el select
    public function mdlGetTipoGastoDB($id)
    {
        $data = $this->db->query("SELECT * FROM tipo_gasto WHERE id_gasto=$id");
        return $data;
    }

    /**Función para insertar en la base de datos los gastos del usuario */
    function mdlInsertGastoUserDB($data)
    {
        $cantidad = $data['cantidad'];
        $gasto = $data['gasto'];
        $tipoGasto = $data['tipoGasto'];
        $fecha = $data['fecha'];
        $idUser = $data['id'];
        $resultado = false;
        $sql = "INSERT INTO gastos_user VALUES (0,$cantidad,'$fecha',$gasto,'$tipoGasto',$idUser)";
        $resultado = $this->db->queryNoSelect($sql);
        return $resultado;
    }
    /**
     * Función para obtener los gastos del usuario
     */
    function mdlGetGastosUserDB($idUsuario, $limit = 0)
    {
        $anioActual = date("Y");
        $data = $this->db->query("SELECT gastos_user.id,cantidad,nombre,tipo_gasto,fecha
        FROM gastos_user JOIN gastos ON gastos_user.id_gasto=gastos.id 
        WHERE YEAR(fecha) ='$anioActual' AND id_user=$idUsuario ORDER BY fecha DESC limit $limit");
        return $data;
    }

    /**
     * Obtener los gastos por anio
     */
    public function mdlGetGastosAnio($idUsuario, $anio)
    {
        $data = $this->db->query("SELECT gastos_user.id,cantidad,nombre,fecha,color
         FROM gastos_user JOIN gastos ON gastos_user.id_gasto=gastos.id WHERE  YEAR(fecha) ='$anio' AND id_user=$idUsuario 
         order by fecha");

        return $data;
    }
}
