<?php

include "desconexion.php";

class perfilusuario
{
    //Atributo para conexión a SGBD
    private $pdo;
    public $indicador;

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

    public function UpdFotEmp($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE Empleado SET 
                    FotEmp    = ?
                    WHERE CodEmp = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtFotEmp,
                        $data->TxtCodEmp
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function UpdPswEmp($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE Empleado SET 
                    PswEmp    = ?
                    WHERE CodEmp = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtPswEmp,
                        $data->TxtCodEmp
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function UpdEmlEmp($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE Empleado SET 
                    EmlEmp    = ?
                    WHERE CodEmp = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtEmlEmp,
                        $data->TxtCodEmp
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function UpdSrcEmp($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE Empleado SET 
                    CodSrc    = ?
                    WHERE CodEmp = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtCodSrc,
                        $data->TxtCodEmp
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtSrc()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SrcObt");
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

}