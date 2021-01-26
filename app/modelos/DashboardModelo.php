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
}
