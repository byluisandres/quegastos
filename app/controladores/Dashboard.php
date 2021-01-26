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
            $gastos = $this->modelo->mdlGetGastos();
            $data = ["gastos" => $gastos];
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
}
