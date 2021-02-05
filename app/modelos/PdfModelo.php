<?php
class pdfModelo
{
    function __construct()
    {
        $this->db = new MYSQLdb();
    }
    function mdlGetGasto($id, $idUsuario)
    {
        $sql = "SELECT gastos_user.id,cantidad,nombre,tipo_gasto,fecha
        FROM gastos_user JOIN gastos ON gastos_user.id_gasto=gastos.id 
        WHERE gastos.id=$id  AND id_user=$idUsuario";
        $data = $this->db->query($sql);
        return $data;
    }

    function mdlGetGastoFechas($data, $id_usuario)
    {
        $fechaInicial = $data['fechaInicial'];
        $fechaFinal = $data['fechaFinal'];

        $sql = "SELECT gastos_user.id,cantidad,nombre,tipo_gasto,fecha
        FROM gastos_user JOIN gastos ON gastos_user.id_gasto=gastos.id WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' AND id_user=$id_usuario";
        $data = $this->db->query($sql);
        return $data;
    }

    function getGastoAnio($anio, $idUsuario)
    {
        $sql = "SELECT gastos_user.id,cantidad,nombre,tipo_gasto,fecha
        FROM gastos_user JOIN gastos ON gastos_user.id_gasto=gastos.id WHERE YEAR(fecha) ='$anio' AND id_user=$idUsuario";
        $data = $this->db->query($sql);
        return $data;
    }
}
