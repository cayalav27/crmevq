<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/empleado.php';

class EmpleadoController{

    private $model;
    private $ruta;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new empleado();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/usuarios/empleado/empleado.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo empleado.
    public function RegEmp(){
        $emp = new empleado();

        //Captura de los datos del formulario (vista).
        $encriptar = crypt($_REQUEST['TxtPswEmp'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $emp->TxtDniEmp = $_REQUEST['TxtDniEmp'];
        $emp->TxtNomEmp = $_REQUEST['TxtNomEmp'];
        $emp->TxtApeEmp = $_REQUEST['TxtApeEmp'];
        $emp->TxtEmlEmp = $_REQUEST['TxtEmlEmp'];
        $emp->TxtGnrEmp = $_REQUEST['TxtGnrEmp'];
        $emp->TxtUsuEmp = $_REQUEST['TxtUsuEmp'];
        $emp->TxtPswEmp = $encriptar;
        $emp->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $emp->TxtCodSrc = $_REQUEST['TxtCodSrc'];
        $emp->TxtCodDiv = $_REQUEST['TxtCodDiv'];
        $emp->TxtFotEmp = uniqid()."-".$_FILES['TxtFotEmp']["name"];
        $ruta = "assets/fotos/".$emp->TxtFotEmp;
        //Registro al modelo empleado.
        if($_FILES['TxtFotEmp']['type'] ===  "image/jpeg" || $_FILES['TxtFotEmp']['type'] ===  "image/jpg" || $_FILES['TxtFotEmp']['type'] ===  "image/png"){
            if(move_uploaded_file($_FILES['TxtFotEmp']["tmp_name"], $ruta)){
            $this->model->RegEmp($emp);
            }
            else {
                echo "No se subio";
            }
        }
        else {
            echo  "La extension del archivo no es permitido";
        }

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: empleado');
    }

    //Método que modifica el modelo de un empleado.
    public function UpdEmp(){
        $emp = new empleado();

        $encriptar = crypt($_REQUEST['TxtPswEmp'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $emp->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $emp->TxtNomEmp = $_REQUEST['TxtNomEmp'];
        $emp->TxtApeEmp = $_REQUEST['TxtApeEmp'];
        $emp->TxtEmlEmp = $_REQUEST['TxtEmlEmp'];
        $emp->TxtGnrEmp = $_REQUEST['TxtGnrEmp'];
        $emp->TxtUsuEmp = $_REQUEST['TxtUsuEmp'];
        $emp->TxtPswEmp = $encriptar;
        $emp->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $emp->TxtCodSrc = $_REQUEST['TxtCodSrc'];
        $emp->TxtCodDiv = $_REQUEST['TxtCodDiv'];
        $emp->TxtFotEmp = uniqid()."-".$_FILES['TxtFotEmp']["name"];
        $ruta = "assets/fotos/".$emp->TxtFotEmp;

        if($_FILES['TxtFotEmp']['type'] ===  "image/jpeg" || $_FILES['TxtFotEmp']['type'] ===  "image/jpg" || $_FILES['TxtFotEmp']['type'] ===  "image/png"){
            if(move_uploaded_file($_FILES['TxtFotEmp']["tmp_name"], $ruta)){
            $this->model->UpdEmp($emp);
            }

            else{
                echo "No se subio";
            }
        }
        else {
            echo  "La extension del archivo no es permitido";
        }

        header('Location: empleado');
        
    }

    //Método que elimina la tupla empleado con el cod_empleado dado.
    public function DltEmp(){
        $this->model->DltEmp($_REQUEST['CodEmp']);
        header('Location: empleado');
    }

}
