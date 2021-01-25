<?php

/**
 * Controlador,para realizar el login y el registro del usuarios
 */

class Dashboard extends Controlador
{

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("DashboardModelo");
    }

    public function index()
    {

        $session = new Session();
        if ($session->getLogin()) {
            $this->vista("dashboardVista", $data = []);
        } else {
            header("Location:" . RUTA_APP);
        }
    }



    /**
     * Funciones del controlador
     */
}
