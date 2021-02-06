<?php

/**
 *
 */
class CalendarioModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MYSQLdb();
    }

    /**
     * Funciones del modelo
     */
    function mdlAddEventos($data, $idUsuario)
    {
        $tituloEvento = $data['tituloEventos'];
        $fecha = $data['fecha'];
        $descripcion = $data['descripcion'];
        $color = $data['color'];
        $resultado = false;

        $sql = "INSERT INTO eventos_calendario VALUES(0,'$tituloEvento','$fecha','$descripcion','$color',$idUsuario)";
        $resultado = $this->db->queryNoSelect($sql);

        if ($resultado) {
            return $resultado;
        }
    }
    //Funcioón para obtener todos los eventos
    function mdlObtenerEventosDB($idUsuario)
    {
        $data = $this->db->query("SELECT id, titulo AS title,fecha AS start,descripcion as description,color AS backgroundColor, color as borderColor
         FROM eventos_calendario WHERE id_usuario=$idUsuario");

        return $data;
    }
}
