<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/cargo.php';

class CargoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new cargo();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/usuarios/cargo/cargo.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo cargo.
    public function RegCrg(){
        $car = new cargo();

        //Captura de los datos del formulario (vista).
        $car->TxtNomCrg = $_REQUEST['TxtNomCrg'];

        //Registro al modelo cargo.
        $this->model->RegCrg($car);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: cargo');
    }

    //Método que modifica el modelo de un cargo.
    public function UpdCrg(){
        $car = new cargo();

        $car->TxtCodCrg = $_REQUEST['TxtCodCrg'];
        $car->TxtNomCrg = $_REQUEST['TxtNomCrg'];
        $car->TxtIndicador = $_REQUEST['TxtIndicador'];
        $this->model->UpdCrg($car);

        header('Location: cargo');
    }

    //Método que elimina la tupla cargo con el cod_perfil dado.
    public function DltCrg(){
        $this->model->DltCrg($_REQUEST['CodCrg']);
        header('Location: cargo');
    }
}
