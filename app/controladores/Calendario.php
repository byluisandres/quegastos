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

    //Guardar los eventos
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
                $resultado = $this->modelo->mdlAddEventos($data, $idUsuario);
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

    //Funcion para borrar
    function ctrlBorrarEvento($id)
    {
        $mensaje = array();
        $resultado = $this->modelo->mdlBorrarEvento($id);
        if ($resultado) {
            $mensaje = [
                "tipo" => "correcto",
                "mensaje" => "Se ha borrado con exito"
            ];
            print json_encode($mensaje);
        } else {
            $mensaje = [
                "tipo" => "error",
                "mensaje" => "No se ha podido borrar"
            ];
            print json_encode($mensaje);
        }
    }

    //Función para modificar
    function ctrlModificarEvento()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mensaje = array();
            $data = [
                "id" => $_POST['id'],
                "titulo" => $_POST['tituloEvento'],
                "fecha" => $_POST['fecha'],
                "descripcion" => $_POST['descripcion'],
                "color" => $_POST['color'],
            ];

            $resultado = $this->modelo->mdlEditarEvento($data);
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
}
