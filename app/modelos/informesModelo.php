<?php

/**
 * 
 */
class InformesModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MYSQLdb();
    }

    /**Funcion para interacturar con la base de datos*/
    /**
     * Función para obtener los gastos
     */
    public function mdlGetGastos()
    {
        $data = $this->db->query("SELECT * FROM gastos");
        return $data;
    }
}
