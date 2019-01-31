<?php

require_once "controller/cliente.controller.php";

class Ajax
{
	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new cliente();
    }

	public $validarRuc;

	public function validarRucAjax(){
		$datos = $this->validarRuc;

		$respuesta = $this->model->validarRucController($datos);

		echo $respuesta;
	}
}

$a = new Ajax();
$a -> validarRuc = $_POST["validarRuc"];
$a -> validarRucAjax();