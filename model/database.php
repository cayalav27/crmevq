<?php

    class Database {

        public static function Conectar(){

            try{

                $dbName = 'db_crm_evq_php';
                $servidor = 'LP-CAYALA'; 
                $usuario= 'sa';
                $pass = 'Cayalav27';     

                $conn= new PDO("sqlsrv:server=".$servidor.";Database=".$dbName,$usuario,$pass); 
            }
            catch(Exception $e){
                die("Error al conectar a la BD: ".$e->getMessage());
            }

        
        return $conn;

        }

        }
    
?>