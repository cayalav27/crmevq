<?php

include "desconexion.php";

class marketing
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

    //Este método elimina la tupla producto dado un CodMkt.
    public function DltMkt($CodMkt)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_MktDlt ?");

            $stm->execute(array($CodMkt));
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodMkt del producto.
    public function UpdMkt($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_MktUpd ?, ?, ?, ?, ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtAsuMrk,
                        $data->TxtFupMrk,
                        $data->TxtCodCli,
                        $data->TxtCodEmp,
                        $data->TxtCodTipInf,
                        $data->TxtCodCan,
                        $data->TxtCodCont,
                        $data->TxtCodMrk
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo producto a la tabla.
    public function RegMkt(Marketing $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_MktReg ?, ?, ?, ?, ?, ?, ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtFecMrk,
                    $data->TxtFinMrk,
                    $data->TxtFupMrk,
                    $data->TxtAsuMrk,
                    $data->TxtCodCli,
                    $data->TxtCodEmp,
                    $data->TxtCodTipInf,
                    $data->TxtCodCan,
                    $data->TxtCodCont,
                    $data->TxtIndicador,
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