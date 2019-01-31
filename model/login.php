<?php

include "desconexion.php";
include "sesiones.php";

class login{

    private $pdo;

    //Método de conexión a SGBD.
    public function __CONSTRUCT()
    {
        try
        {   
            $this->objSe = new sessions();
            $this->pdo = Database::Conectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function cargar_Login($login,$password)
    {
        try
        {
            
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT e.CodEmp, e.DniEmp, e.NomEmp, e.ApeEmp, e.EmlEmp, e.GnrEmp, e.FotEmp, e.UsuEmp, e.PswEmp, 
                                        e.CodPrf, p.NomPrf, p.CodCrg, p.EqpPrf, c.NomCrg, e.CodSrc, s.NumSrc, e.CodDiv, d.NomDiv
                                        FROM Empleado e
                                        INNER JOIN Perfil p
                                        ON p.CodPrf = e.CodPrf
                                        INNER JOIN Cargo c
                                        ON c.CodCrg = p.CodCrg
                                        INNER JOIN Score s
                                        ON s.CodSrc = e.CodSrc
                                        INNER JOIN Divisiones d
                                        on d.CodDiv = e.CodDiv
                                        WHERE e.UsuEmp= :login and e.PswEmp = :password and e.indicador = 1");
            $stm->bindValue(':login',$login);
            $stm->bindValue(':password',$password);
            //Ejecución de la sentencia SQL.
            $stm->execute();

            $result = $stm->fetchAll();

            if($result){

                $cargo = $result[0]['NomCrg'];

                switch ($cargo) {

                    case 'Administrador':
                        $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        header("location:dashboard");
                        break;
                    
                    case 'Gerente Comercial':
                        $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        header("location:seguimientogerente");
                        break;

                    case 'Jefe Comercial':
                        $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        $this->objSe->set('CodDiv', $result[0]['CodDiv']);
                        $this->objSe->set('NomDiv', $result[0]['NomDiv']);
                        header("location:seguimiento");
                        break;

                    case 'Consultor Comercial':
                    $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        $this->objSe->set('CodDiv', $result[0]['CodDiv']);
                        $this->objSe->set('NomDiv', $result[0]['NomDiv']);
                        header("location:indicadores");
                        break;

                    case 'Formulador':
                        $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        header("location:clienteformulador");
                        break;

                    case 'Gestor':
                        $this->objSe->init();
                        $this->objSe->set('CodEmp', $result[0]['CodEmp']);
                        $this->objSe->set('DniEmp', $result[0]['DniEmp']);
                        $this->objSe->set('NomEmp', $result[0]['NomEmp']);
                        $this->objSe->set('ApeEmp', $result[0]['ApeEmp']);
                        $this->objSe->set('EmlEmp', $result[0]['EmlEmp']);
                        $this->objSe->set('GnrEmp', $result[0]['GnrEmp']);
                        $this->objSe->set('FotEmp', $result[0]['FotEmp']);
                        $this->objSe->set('UsuEmp', $result[0]['UsuEmp']);
                        $this->objSe->set('PswEmp', $result[0]['PswEmp']);
                        $this->objSe->set('CodPrf', $result[0]['CodPrf']);
                        $this->objSe->set('NomPrf', $result[0]['NomPrf']);
                        $this->objSe->set('EqpPrf', $result[0]['EqpPrf']);
                        $this->objSe->set('CodCrg', $result[0]['CodCrg']);
                        $this->objSe->set('NomCrg', $result[0]['NomCrg']);
                        $this->objSe->set('CodSrc', $result[0]['CodSrc']);
                        $this->objSe->set('NumSrc', $result[0]['NumSrc']);
                        header("location:indicadoresmkt");
                        break;
                    
                }
            }
            else {
                header("location:index.php?action=fallo");
            }

            /*
            $numero_registro= $stm->rowCount();
            if($numero_registro!=0){
                session_start();
                $_SESSION ["usuario"]=$_POST["login"];
                header("location:indicadores");
                        } 
            else {
                header("location:index.php");
                    }
            */

            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            //return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();
            
        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }
}
      
?>