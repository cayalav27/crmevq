<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/perfilusuario.php';

class PerfilAdministradorController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new perfilusuario();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/perfiladministrador/perfiladministrador.php';
        require_once 'view/footer.php';
    }

        public function UpdFotEmp(){
        $miperf = new perfilusuario();

        $miperf->TxtCodEmp = $_REQUEST['TxtCodEmp'];

        $miperf->TxtFotEmp = uniqid()."-".$_FILES['TxtFotEmp']["name"];
        $ruta = "assets/fotos/".$miperf->TxtFotEmp;

        if($_FILES['TxtFotEmp']['type'] ===  "image/jpeg" || $_FILES['TxtFotEmp']['type'] ===  "image/jpg" || $_FILES['TxtFotEmp']['type'] ===  "image/png"){
            if(move_uploaded_file($_FILES['TxtFotEmp']["tmp_name"], $ruta)){
            $this->model->UpdFotEmp($miperf);
            }

            else{
                echo "No se cambio";
            }
        }
        else {
            echo  "La extension del archivo no es permitido";
        }

        header('Location: salir');
    }

    public function UpdPswEmp(){
        $miperf = new perfilusuario();

        $encriptar = crypt($_REQUEST['TxtPswEmp'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $miperf->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $miperf->TxtPswEmp = $encriptar;

        $this->model->UpdPswEmp($miperf);

        header('Location: salir');
    }

    public function UpdEmlEmp(){
        $miperf = new perfilusuario();

        $miperf->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $miperf->TxtEmlEmp = $_REQUEST['TxtEmlEmp'];

        $this->model->UpdEmlEmp($miperf);

        header('Location: salir');
    }

}
