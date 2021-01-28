<?php
date_default_timezone_set('Europe/Madrid');
function extraerMesCastellano($fecha)
{
    $timestamp = strtotime($fecha);
    $mes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $mes_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $dia = date('F', $timestamp);
    $nombreMes = str_replace($mes_EN, $mes, $dia);
    return $nombreMes;
}
