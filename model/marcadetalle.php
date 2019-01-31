<?php

include "desconexion.php";

class marcadetalle
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

    //Este método selecciona todas las tuplas de la tabla
    //detalle-linea-producto en caso de error se muestra por pantalla.
    public function ListMrcDet($CodMrc)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcDetList ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->bindParam(1, $CodMrc, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll();
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Este método elimina la tupla producto dado un CodDetMrc.
    public function DltMrcDet($CodDetMrc)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_MrcDetDlt ?");

            $stm->execute(array($CodDetMrc));
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodDetMrc del producto.
    public function UpdMrcDet($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "ups_MrcDetUpd ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtNomDetMrc,
                        $data->TxtCodPrf,
                        $data->TxtIndicador,
                        $data->TxtCodDetMrc
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo producto a la tabla.
    public function RegMrcDet(marcadetalle $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_MrcDetReg ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtNomDetMrc,
                    $data->TxtCodMrc,
                    $data->TxtCodPrf,
                    $data->TxtIndicador,
                )
            );
            disconnect();
            
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function ObtMrc($CodMrc)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->execute(array($CodMrc));
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

    public function ObtPrf()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT * FROM Perfil WHERE Indicador = 1");
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