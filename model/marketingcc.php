<?php

include "desconexion.php";

class marketingcc
{
    //Atributo para conexión a SGBD
    private $pdo;
    public $TxtIndicador;

    //Método de conexión a SGBD.
    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::Conectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListMkt()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos de Listas de proveedores.
            $stm = $this->pdo->prepare("EXEC ups_MktList");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();

        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }
    
    public function ListDetAte($CodMrk)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el CodMrk de la venta.
            $stm = $this->pdo->prepare("EXEC ups_DetAteList ?");
            //Ejecución de la sentencia SQL utilizando el parámetro CodMrk.
            $stm->bindParam(1, $CodMrk, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll();
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegDetAte(marketingcc $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_DetAteReg ?, ?, ?, ?, ?, ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtFecDetAte,
                    $data->TxtFcrDetAte,
                    $data->TxtFupDetAte,
                    $data->TxtRptDetAte,
                    $data->TxtReiDetAte,
                    $data->TxtComDetAte,
                    $data->TxtCodMrk,
                    $data->TxtCodEmp,
                    $data->TxtIndicador,
                )
            );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function UpdDetAte($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_DetAteUpd ?, ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtFecDetAte,
                        $data->TxtFupDetAte,
                        $data->TxtRptDetAte,
                        $data->TxtReiDetAte,
                        $data->TxtComDetAte,
                        $data->TxtCodMrk,
                        $data->TxtCodDetAte
                    )
                );
                 disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListCli()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_CliList");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();

        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }

    public function ListTipInf()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_TipInfList");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();

        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }

    public function ListCan()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_CanList");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();

        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }

    public function ListDiv()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_DivList");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
            disconnect();

        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }

    //utilizando SQL.
    public function ObtMkt($CodMrk)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el CodMrk de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MktObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro CodMrk.
            $stm->execute(array($CodMrk));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}