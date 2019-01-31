<?php
    
    require "model/sesiones.php";

    $objses = new sessions();
    $objses->init();

    if(isset($_SESSION["UsuEmp"])){
        $user = $objses->get('UsuEmp');
        $iduser = $objses->get('CodEmp');
        $idcargo = $objses->get('CodCrg');

        if($idcargo != 3){
            $objses->destroy();
            header("location: login");
        }
    }
    
    else{
        $users = isset($_SESSION['UsuEmp']) ? $_SESSION['UsuEmp'] : null ;

        if($users == ''){
        header("location: login");
        }
    }
        
      