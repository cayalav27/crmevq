<?php

include "desconexion.php";

class marca
{
    //Atributo para conexión a SGBD
    private $pdo;

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
    public function ListMrc($CodProv)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el CodProv de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcList ?");
            //Ejecución de la sentencia SQL utilizando el parámetro CodProv.
            $stm->bindParam(1, $CodProv, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll();
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Este método elimina la tupla producto dado un CodMrc.
    public function DltMrc($CodMrc)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_MrcDlt ?");

            $stm->execute(array($CodMrc));
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodMrc del producto.
    public function UpdMrc($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_MrcUpd ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtNomMrc,
                        $data->TxtIndicador,
                        $data->TxtCodMrc
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo producto a la tabla.
    public function RegMrc(Marca $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_MrcReg ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtNomMrc,
                    $data->TxtCodProv,
                    $data->TxtIndicador,
                )
            );
            disconnect();
            
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListProv()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos de Listas de proveedores.
            $stm = $this->pdo->prepare("EXEC ups_ProvList");
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
    
    public function ObtProv($CodProv)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_ProvObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->execute(array($CodProv));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListPais()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PaisList");
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

    public function ListCiu()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT * FROM Ciudad");
            //Ejecución de la sentencia SQL.
            $stm->execute(array());
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