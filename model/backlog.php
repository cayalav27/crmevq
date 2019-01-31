<?php

include "desconexion.php";

class backlog
{
    //Atributo para conexión a SGBD
    private $pdo;

    //Atributos del objeto linea-producto
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

    //Este método selecciona todas las tuplas de la tabla
    //linea-producto en caso de error se muestra por pantalla.
    public function ListBkl($CodEmp)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_BklList $CodEmp");
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

    //Este método elimina la tupla producto dado un CodBkl.
    public function DltBkl($CodBkl)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_BklDlt ?");

            $stm->execute(array($CodBkl));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodBkl del producto.
    public function UpdBkl($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_BklUpd ?, ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtMntBkl,
                        $data->TxtComBkl,
                        $data->TxtDtfBkl,
                        $data->TxtCodOgn,
                        $data->TxtCodBkl
                    )
                );
                disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo backlog a la tabla.
    public function RegBkl(backlog $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_BklReg ?, ?, ?, ?, ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtMntBkl,
                    $data->TxtComBkl,
                    $data->TxtDtfBkl,
                    $data->TxtCodCli,
                    $data->TxtCodProd,
                    $data->TxtCodEmp,
                    $data->TxtCodOgn,
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

    public function ListProd()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT * FROM Producto WHERE Indicador = 1");
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

    public function ObtBkl($CodBkl)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el CodBkl del cliente.
            $stm = $this->pdo->prepare("EXEC ups_BklObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro CodBkl.
            $stm->execute(array($CodBkl));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();   

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListDetMrc($CodPrf)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_MrcDetObtAjx $CodPrf");
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

    public function ObtOgn()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_OgnObt");
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