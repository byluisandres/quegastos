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

    /**
     * Función que verifica el usuario en la base de datos para realizar el login
     */
    function verificar($email, $password)
    {
        $errores = array();
        if ($email == "" | $password == "") {
            array_push($errores, "Todos los campos son obligatorios");
        } else {
            $passwordEncry = hash("sha512", $password);
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$passwordEncry'";
            $data = $this->db->query($sql);
            if (empty($data)) {
                array_push($errores, "El usuario y/o la contraseña con incorrectas.");
            }
        }
        return $errores;
    }

    function getUsuarioCoreo($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $data = $this->db->query($sql);
        return $data;
    }
}
