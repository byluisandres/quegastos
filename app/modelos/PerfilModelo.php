<?php

/**
 *
 */
class PerfilModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MYSQLdb();
    }

    /**
     * Funciones del modelo
     */

    //Actulizar al usuario
    function mdlActualizarUsuario($data)
    {

        $id =  $data['id'];
        $nombre =  $data['nombre'];
        $email =  $data['email'];
        $password =  $data['password'];
        $passwordEncry = hash("sha512", $password);
        $resultado = false;
        $sql = "UPDATE usuarios SET nombre='$nombre',email='$email', password='$passwordEncry' WHERE id=$id";
        $resultado = $this->db->queryNoSelect($sql);
        return $resultado;
    }

    function mdlActualizarUsuarioFoto($data)
    {
        $idUsuario =  $data['idUsuario'];
        $ruta =  $data['ruta'];
        $resultado = false;
        $sql = "UPDATE usuarios SET imagen='$ruta' WHERE id=$idUsuario";
        $resultado = $this->db->queryNoSelect($sql);
        return $resultado;
    }
}
