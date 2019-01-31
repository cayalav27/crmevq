<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/login.php';

class LoginController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new login();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/login/login.php';
    }

    public function Ingreso(){
        $emp = new login();
        $mensaje = null;

        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["login"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

        $usuarios = $_POST['login'];
        $passwor = $_POST['password'];
        
        $encriptar = crypt($_POST['password'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        
        //if(count($usuarios) > 0 && count($passwor) > 0 ){
            $emp = $this->model->cargar_Login($usuarios,$encriptar);
        //}
        /*else{
        echo "Por Favor completar los campos";
        }*/
        echo $mensaje;
        }
    }

}
