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
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if ($session->getLogin()) {
            $this->vista("informesVista", $data = []);
        } else {
            header("Location:" . RUTA_APP);
        }
    }


    /**
     * Funciones del controlador
     */
}