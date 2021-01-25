<?php
class Session
{
    private $login = false;
    private $usuario;
    function __construct()
    {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $this->usuario = $_SESSION['usuario'];
            $this->login = true;
        } else {
            unset($this->usuario);
            $this->login = false;
        }
    }

    function iniciarLogin($usuario)
    {
        if ($usuario) {
            $this->usuario = $_SESSION['usuario'] = $usuario;
            $this->login = true;
        }
    }

    function cerrarSesion()
    {
        unset($_SESSION['usuario']);
        unset($this->usuario);
        $this->login = false;
    }

    function getLogin()
    {
        return $this->login;
    }
    function getUsuario()
    {
        return $this->usuario;
    }
}
