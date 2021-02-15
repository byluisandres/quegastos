<?php

class Informes extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("InformesModelo");
    }

    public function index()
    {
        $session = new Session();
        $gastos = $this->modelo->mdlGetGastos();
        if ($session->getLogin()) {
            $data = ["gastos" => $gastos];
            $this->vista("informesVista", $data);
        } else {
            header("Location:" . RUTA_APP);
        }
    }


    /**
     * Funciones del controlador
     */
}
