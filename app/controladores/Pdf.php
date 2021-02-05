<?php
class pdf extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("PdfModelo");
    }


    //genera el pdf entre dos fechas
    function generarPdfFechas()
    {
        $fechaInicial = isset($_GET['fechaInicial']) ? $_GET['fechaInicial'] : "";
        $fechaFinal = isset($_GET['fechaFinal']) ? $_GET['fechaFinal'] : "";
        $datos = [
            "fechaInicial" => $fechaInicial,
            "fechaFinal" => $fechaFinal
        ];
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $data = $this->modelo->mdlGetGastoFechas($datos, $idUsuario);
        $this->vista("pdfVista", $data);
    }

    //genera el pdf por anio seleccionado
    function generarPdfAnio()
    {
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $anio = isset($_GET['anio']) ? $_GET['anio'] : "";
        $data = $this->modelo->getGastoAnio($anio,$idUsuario);
        $this->vista("pdfVista", $data);
    }

    //genera el pdf por gasto
    function generarPdfGasto()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $data = $this->modelo->mdlGetGasto($id,$idUsuario);
        $this->vista("pdfVista", $data);
    }
    ///obtiene las fechas del formulario
    function ctrlGetFechasForm()
    {
        $errores = array();
        $mensaje = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $fechaInicial = isset($_POST['fechaInicial']) ? $_POST['fechaInicial'] : "";
            $fechaFinal = isset($_POST['fechaFinal']) ? $_POST['fechaFinal'] : "";

            $data = [
                "fechaInicial" => $fechaInicial,
                "fechaFinal" => $fechaFinal
            ];

            if ($fechaInicial == "" || $fechaFinal == "") {
                array_push($errores, "Todos los campos son obligatorios");
            }

            if (count($errores) == 0) {
                $resultado = $this->modelo->mdlGetGastoFechas($data, $idUsuario);
                if (count($resultado) > 0) {
                    $mensaje = [
                        "tipo" => "bien",
                        "mensaje" => "generarPdfFechas",
                        "fechaIncial" => $fechaInicial,
                        "fechaFinal" => $fechaFinal,
                    ];
                    print json_encode($mensaje);
                } else {
                    $mensaje = [
                        "tipo" => "error",
                        "mensaje" => "No hay resultado entre esas fechas"
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

    //obtiene el anio del select
    function ctrlGetAnioForm($anio)
    {
        $errores = array();
        $mensaje = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if (count($errores) == 0) {
            $resultado = $this->modelo->getGastoAnio($anio,$idUsuario);
            
            if (count($resultado) > 0) {
                $mensaje = [
                    "tipo" => "bien",
                    "mensaje" => "generarPdfAnio",
                    "anio" => $anio,
                ];
                print json_encode($mensaje);
            } else {
                $mensaje = [
                    "tipo" => "error",
                    "mensaje" => "No hay resultado para ese año"
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

    //Obtiene el id el gasto para obtener los gasto
    function ctrlGetGasto($id)
    {
        $errores = array();
        $mensaje = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if (count($errores) == 0) {
            $resultado = $this->modelo->mdlGetGasto($id,$idUsuario);
            if (count($resultado) > 0) {
                $mensaje = [
                    "tipo" => "bien",
                    "mensaje" => "generarPdfGasto",
                    "id" => $id,
                ];
                print json_encode($mensaje);
            } else {
                $mensaje = [
                    "tipo" => "error",
                    "mensaje" => "No hay resultados"
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
