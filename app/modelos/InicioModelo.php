<?php

/**
 * 
 */
class InicioModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MYSQLdb();
    }

    /**Funcion para interacturar con la base de datos*/

    //función para registrar un usuario en la base de datos
    function mdlRegistarUsuarioDB($data)
    {
        $nombre = $data['nombre'];
        $email = $data['email'];
        $password = $data['password'];
        $passwordEncry = hash("sha512", $password);
        $resultado = false;
        $ruta = "../img/fotos_perfil/avatar.png";
        $fecha = date("Y-m-d H:i:s");
        if ($this->validaCorreo($email)) {
            $sql = "INSERT INTO usuarios VALUES(0,'$nombre','$email','$passwordEncry','$ruta','$fecha')";
            $resultado = $this->db->queryNoSelect($sql);
        }
        return $resultado;
    }
    //función para comprobar que el email no este repetido
    function validaCorreo($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $data = $this->db->query($sql);
        return count($data) == 0 ? true : false;
    }
}
