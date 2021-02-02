<?php

/**
 * Controlador de libros
 */

class Login extends Controlador
{

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("InicioModelo");
    }

    public function index()
    {
        //llamamos a la vista
        $this->vista("inicioVista", $data = []);
    }


    /**
     * Funciones del controlador
     */
    //redirigir a la vista de registro
    public function registro()
    {
        $this->vista("registrarseVista", $data = []);
    }


    /**
     * Función que recibe los datos del formulario de registro y para registrar al
     * usuario
     */
    public function ctrlRegistrarse()
    {
        $errores = array();
        $mensaje = array();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            //obtener los datos del formulario
            $nombre = htmlentities(isset($_POST['nombre']) ? $_POST['nombre'] : "");
            $email = htmlentities(isset($_POST['email']) ? $_POST['email'] : "");
            $password = htmlentities(isset($_POST['password']) ? $_POST['password'] : "");
            //datos que se envian al modelo
            $data = [
                'nombre' => $nombre,
                'email' => $email,
                'password' => $password,
            ];

            //validaciones
            if ($nombre == "" || $email == "" | $password == "") {
                array_push($errores, "Todos los campos son obligatorios");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "Correo no válido");
            }
            //enviar los mensaje al frontend
            if (count($errores) === 0) {
                $resultado = $this->modelo->mdlRegistarUsuarioDB($data);
                if ($resultado) {
                    $mensaje = [
                        "tipo" => "correcto",
                        "mensaje" => "Se ha registrado con éxito"
                    ];
                    print json_encode($mensaje);
                } else {
                    $mensaje = [
                        "tipo" => "error",
                        "mensaje" => "Correo ya registrado"
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
     * Función para realizar el login
     *
     */

    function login()
    {
        $errores = array();
        $mensaje = array();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            //obtener los datos del formulario
            $email = htmlentities(isset($_POST['email']) ? $_POST['email'] : "");
            $password = htmlentities(isset($_POST['password']) ? $_POST['password'] : "");
            $recordar = isset($_POST['recordar']) ? "on" : "off";
            $errores = $this->modelo->verificar($email,$password);
            
            
            if (empty($errores)) {
                $email = $this->modelo->getUsuarioCoreo($email);
                $session = new Session();
                $session->iniciarLogin($email);
                header("Location:" . RUTA_APP . "/dashboard");
            } else {
                $datos = [
                    "email" => $email,
                    "password" => $password,
                    "recordar" => $recordar
                ];
                $data = ["errores" => $errores, "datos" => $datos];
                $this->vista("inicioVista", $data);
            }
        }
        
    }
}
