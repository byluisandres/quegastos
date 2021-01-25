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

    /**Funciones */

    function getUserGastosDB()
    {


        $data = $this->db->query("SELECT * FROM clientes WHERE id_user=1 ");

        return $data;
    }
}