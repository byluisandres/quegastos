<?php
class Perfil extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("PerfilModelo");
    }


    public function index()
    {
        $session = new Session();
        $usuario = $session->getUsuario();
        if ($session->getLogin()) {
            $data = ["usuario" => $usuario];
            $this->vista("perfilVista", $data);
        } else {
            header("Location:" . RUTA_APP);
        }
    }

    //Cambiar foto de perfil
    function ctrlCambiarFoto()
    {
        //obtener id del usuario
        $session = new Session();
        $usuario = $session->getUsuario();
        $idUsuario = $usuario[0]['id'];
        $extensionImg = "";
        $mensaje = array();
        $ruta = "img/fotos_perfil"; //ruta
        $archivo = $_FILES['imagen']['tmp_name']; //ruta temporal
        $nombreArchivo = $_FILES['imagen']['name']; //nombre del archivo
        $info = pathinfo($nombreArchivo); //para obtener la extension
        if ($archivo !== '') {
            $extensionImg = $info['extension'];
            if ($extensionImg == "png" || $extensionImg == "jpg" || $extensionImg == "PNG" || $extensionImg == "JPG") {
                //Enviar el modelo
                move_uploaded_file($archivo, "img/fotos_perfil/" . $nombreArchivo);
                $ruta = $ruta . "/" . $nombreArchivo;
                $data = [
                    "idUsuario" => $idUsuario,
                    "ruta" => $ruta,
                ];
                $resultado = $this->modelo->mdlActualizarUsuarioFoto($data);
                if ($resultado) {
                    $mensaje = [
                        "tipo" => "correcto",
                        "mensaje" => "Se ha actulizado con éxito"
                    ];
                    print json_encode($mensaje);
                } else {
                    $mensaje = [
                        "tipo" => "error",
                        "mensaje" => "Hubo un fallo al intentar actualizar"
                    ];
                    print json_encode($mensaje);
                }
            } else {
                $mensaje = [
                    "tipo" => "fail",
                    "mensaje" => "Formato no válido"
                ];
                print json_encode($mensaje);
                exit();
            }
        } else {
            $ruta = "img/fotos_perfil/incognito.png";
        }
    }

    function ctrlActualizarDatos()
    {
        $errores = array();
        $mensaje = array();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            $data = [
                "id" => $id,
                "nombre" => $nombre,
                "email" => $email,
                "password" => $password
            ];
            if ($password == "") {
                array_push($errores, "Todos los campos son obligatorios");
            }
            if (count($errores) === 0) {
                $resultado = $this->modelo->mdlActualizarUsuario($data);
                if ($resultado) {
                    $mensaje = [
                        "tipo" => "correcto",
                        "mensaje" => "Se ha actulizado con éxito"
                    ];
                    print json_encode($mensaje);
                } else {
                    $mensaje = [
                        "tipo" => "error",
                        "mensaje" => "Hubo un fallo al intentar actulizar"
                    ];
                    print json_encode($mensaje);
                }
            } else {
                die();
                return;
            }
        }
    }
}
