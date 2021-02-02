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
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if ($session->getLogin()) {
            $gastos = $this->modelo->mdlGetGastos();
            $userGastos = $this->modelo->mdlGetGastosUserDB($idUsuario, 10);
            $data = ["gastos" => $gastos, "userGastos" => $userGastos];
            $this->vista("dashboardVista", $data);
        } else {
            header("Location:" . RUTA_APP);
        }
    }



    /**
     * Funciones del controlador
     */

    //Función para obtener el tipo de gasto, según el gasto
    public function ctrlGetTipoGasto($id)
    {
        $data = $this->modelo->mdlGetTipoGastoDB($id);
        if (empty($data)) {
            print json_encode("fail");
        } else {
            print json_encode($data);
        }
    }

    //Función para obtener los datos del formulario, validarlos y enviarlos al modelo para
    //guardarlo en la base datos
    public function ctrlDatosFormGasto()
    {
        $errores = array();
        $mensaje = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
            $gasto = isset($_POST['gasto']) ? $_POST['gasto'] : "";
            $tipoGasto = isset($_POST['tipoGasto']) ? $_POST['tipoGasto'] : "";
            $fecha = date("Y-m-d H:i:s");

            //datos a enviar al modelo
            $data = [
                "cantidad" => $cantidad,
                "gasto" => $gasto,
                "tipoGasto" => $tipoGasto,
                "fecha" => $fecha,
                "id" => $idUsuario
            ];

            //validaciones
            if ($cantidad == "" || $gasto == "" | $tipoGasto == "") {
                array_push($errores, "Todos los campos son obligatorios");
            }

            //comprobrar los errores
            if (count($errores) === 0) {
                $resultado = $this->modelo->mdlInsertGastoUserDB($data);
                if ($resultado) {
                    $mensaje = [
                        "tipo" => "correcto",
                        "mensaje" => "Se ha registrado con éxito"
                    ];
                    print json_encode($mensaje);
                }
            } else {
                $mensaje = [
                    "tipo" => "fail",
                    "mensaje" => $errores
                ];
                print json_encode($mensaje);
            }
        }
    }

    /**
     * Función para obtener los gastos del usuario mes a mes
     */
    function ctrlObtenerGastoUser()
    {
        $gastos = [];
        $sumaTotal = 0;
        $gastosMes = [];
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $userGastos = $this->modelo->mdlGetGastosUserDB($idUsuario, 100000000000);
        foreach ($userGastos as  $filas) {
            $sumaTotal += intval($filas['cantidad']);
            if (!isset($gastosMes[extraerMesCastellano($filas['fecha'])])) {
                $gastosMes[extraerMesCastellano($filas['fecha'])] = intval($filas['cantidad']);
            } else {
                $gastosMes[extraerMesCastellano($filas['fecha'])] += intval($filas['cantidad']);
            }
            if (!isset($gastos[$filas['nombre']])) {
                $gastos[$filas['nombre']] = intval($filas['cantidad']);
            } else {
                $gastos[$filas['nombre']] += intval($filas['cantidad']);
            }
        }

        $graficaGastos = [
            "gastoMes" => $gastosMes,
            "gastoTotal" => $sumaTotal,
            "gastos" => $gastos,
        ];
        print json_encode($graficaGastos);
    }
    /**
     * Función para obtener los gastos por anio
     */
    function ctrlGetGastosAnio($anio)
    {
        $gastos = [];
        $sumaTotal = 0;
        $mensaje = array();
        $gastosMes = [];
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $resultado = $this->modelo->mdlGetGastosAnio($idUsuario,$anio);
        if ($resultado) {
            foreach ($resultado as  $filas) {
                $sumaTotal += $filas['cantidad'];
                if (!isset($gastosMes[extraerMesCastellano($filas['fecha'])])) {
                    $gastosMes[extraerMesCastellano($filas['fecha'])] = intval($filas['cantidad']);
                } else {
                    $gastosMes[extraerMesCastellano($filas['fecha'])] += intval($filas['cantidad']);
                }
                if (!isset($gastos[$filas['nombre']])) {
                    $gastos[$filas['nombre']] = intval($filas['cantidad']);
                } else {
                    $gastos[$filas['nombre']] += intval($filas['cantidad']);
                }
            }
            $dataGastosMes = [
                "tipo" => "bien",
                "gastoTotal" => $sumaTotal,
                "gastos" => $gastos,
                "dataGastosMes" => $gastosMes,
            ];
            print json_encode($dataGastosMes);
        } else {
            $mensaje = [
                "tipo" => "error",
                "mensaje" => "No hay datos para ese año"
            ];
            print json_encode($mensaje);
        }
    }
}
