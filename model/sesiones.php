<?php

class sessions{

		public function __CONSTRUCT()
	{
		
	}

	// INIT que es para inicializar las variables de Session a utilizar
	public function init(){
		@session_start();
	}

	// SET ns permite inicializar las variables de Session a utilizar
	public function set($varname, $value){
		
		// $varname = este sera el nombre de nuestra variable de sesion
		// $ value = el valor que tendra  nuestra variable de session

		$_SESSION[$varname] = $value;

	}

	public function get($varname){            
            return $_SESSION[$varname];            
    }	

	// DESTROY es para quitar las variables creadas y destruir la sesion

	public function destroy(){

			session_unset();
			session_destroy();
	}
}

?>