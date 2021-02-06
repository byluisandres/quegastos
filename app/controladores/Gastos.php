<?php

class Gastos extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("ListaGastosModelo");
    }

    public function index()
    {
        $data = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $userGastos = $this->modelo->mdlGetUserGastosDB($idUsuario, 1000000000);
        $datosGasto  = $this->modelo->mdlGetGastos();
        $data = [
            'gastos' => $datosGasto,
            'userGastos' => $userGastos
        ];
        $this->vista("listaGastosVista", $data);
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


    //Función que recibe el id del gasto para borralo
    public function ctrlBorrarGasto($id)
    {

        $mensaje = array();
        $resultado = $this->modelo->mdlBorrarGasto($id);
        if ($resultado) {
            $mensaje = [
                "tipo" => "correcto",
                "mensaje" => "Se ha borrado con exito"
            ];
            print json_encode($mensaje);
        }
    }

    //Función para editar
    function ctrlEditarGasto()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mensaje = array();
            $fecha = date("Y-m-d H:i:s");
            $data = [
                "idGastoUser" => $_POST['idGasto'],
                "cantidad" => $_POST['cantidad'],
                "idGasto" => $_POST['gasto'],
                "tipoGasto" => $_POST['tipoGasto'],
                "fecha" => $fecha
            ];

            $resultado = $this->modelo->mdlEditarGastoUserDB($data);
            if ($resultado) {
                $mensaje = [
                    "tipo" => "correcto",
                    "mensaje" => "Se ha actualizado con exito"
                ];
                print json_encode($mensaje);
            } else {
                $mensaje = [
                    "tipo" => "error",
                    "mensaje" => "Error al actualizar, intentalo mas tarde"
                ];
                print json_encode($mensaje);
            }
        }
    }

    //obtener los gastos mes a mes y los gastos para pintar en la gráfica
    function ctrlObtenerGastoUserBD()
    {
        $gastos = [];
        $gastosMes = [];
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $userGastos = $this->modelo->mdlGetUserGastosDB($idUsuario, 1000000000);
        foreach ($userGastos as  $filas) {
            if (!isset($gastos[$filas['nombre']])) {
                $gastos[$filas['nombre']] = intval($filas['cantidad']);
            } else {
                $gastos[$filas['nombre']] += intval($filas['cantidad']);
            }

            if (!isset($gastosMes[extraerMesCastellano($filas['fecha'])])) {
                $gastosMes[extraerMesCastellano($filas['fecha'])] = intval($filas['cantidad']);
            } else {
                $gastosMes[extraerMesCastellano($filas['fecha'])] += intval($filas['cantidad']);
            }
        }

        $graficaGastos = [
            "gastos" => $gastos,
            "gastoMes" => $gastosMes
        ];
        print json_encode($graficaGastos);
    }
}
