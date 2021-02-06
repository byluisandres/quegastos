<?php
class Calendario extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("CalendarioModelo");
    }


    public function index()
    {

        $session = new Session();
        $usuario = $session->getUsuario();
        if ($session->getLogin()) {
            $this->vista("calendarioVista", $data = []);
        } else {
            header("Location:" . RUTA_APP);
        }
    }

    function ctrlEnviarDatosEventosForm()
    {
        $errores = array();
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $tituloEvento = isset($_POST['tituloEvento']) ? $_POST['tituloEvento'] : "";
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $color = isset($_POST['color']) ? $_POST['color'] : "";
            $data = [
                "tituloEventos" => $tituloEvento,
                "fecha" => $fecha,
                "descripcion" => $descripcion,
                "color" => $color
            ];

            if ($tituloEvento === "" || $fecha === "" | $descripcion === "" || $color == "") {
                array_push($errores, "Todos los datos son obigatorios");
            }

            if (count($errores) === 0) {
                $resultado = $this->modelo->mdlAddEventos($data,$idUsuario);
                if ($resultado) {
                    $mensaje = [
                        "tipo" => "correcto",
                        "mensaje" => "Se ha registrado con éxito"
                    ];
                    print json_encode($mensaje);
                }
            } else {
                $mensaje = [
                    "tipo" => "error",
                    "mensaje" => $errores
                ];
                print json_encode($mensaje);
            }
        }
    }

    //Función para obtener todos los eventos
    function ctrlObtenerEventos()
    {
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $data = $this->modelo->mdlObtenerEventosDB($idUsuario);
        if (empty($data)) {
            print json_encode("fail");
        } else {
            print json_encode($data);
        }
    }
}
