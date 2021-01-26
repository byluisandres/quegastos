<?php

class Gastos extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("ListaGastosModelo");
    }

    public function index()
    {
       
        $this->vista("listaGastosVista", $data=[]);
    }


    /**
     * Funciones del controlador
     */
}
