<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/perfil.php';

class PerfilController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new perfil();
    }

    //Llamado plantilla principal
    public function Index(){

        $perf = new perfil();

        //Se obtienen los datos del perfil a editar.
        if(isset($_REQUEST['CodCrg'])){
            $perf = $this->model->ObtCrg($_REQUEST['CodCrg']);
        }

        require_once 'view/administrador/header.php';
        require_once 'view/administrador/usuarios/perfiles/perfil.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo perfil.
    public function RegPrf(){
        $perf = new perfil();

        //Captura de los datos del formulario (vista).
        $perf->TxtNomPrf = $_REQUEST['TxtNomPrf'];
        $perf->TxtEqpPrf = $_REQUEST['TxtEqpPrf'];
        $perf->TxtCodCrg = $_REQUEST['TxtCodCrg'];
        //Registro al modelo perfil.
        $this->model->RegPrf($perf);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('perfil&a=Index&CodCrg=').$_REQUEST['TxtCodCrg']);
    }

    //Método que modifica el modelo de un perfil.
    public function UpdPrf(){
        $perf = new perfil();

        $perf->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $perf->TxtNomPrf = $_REQUEST['TxtNomPrf'];
        $perf->TxtEqpPrf = $_REQUEST['TxtEqpPrf'];
        $perf->TxtCodCrg = $_REQUEST['TxtCodCrg'];
        $perf->TxtIndicador = $_REQUEST['TxtIndicador'];
        $this->model->UpdPrf($perf);

        header('Location: '.urlencode('perfil&a=Index&CodCrg=').$_REQUEST['TxtCodCrg']);
    }

    //Método que elimina la tupla perfil con el CodPrf dado.
    public function DltPrf(){
        $this->model->DltPrf($_REQUEST['CodPrf']);
        header('Location: cargo');
    }
}
