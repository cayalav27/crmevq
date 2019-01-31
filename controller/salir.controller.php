<?php

require "model/sesiones.php";

class SalirController{

	public function Index(){
        $objSe = new sessions();
        $objSe->init();
        $objSe->destroy();
		header("location:login");
    }

}

