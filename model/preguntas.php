<?php

include "desconexion.php";

class preguntas
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

    public function ListPrgCal()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PrgCalList");
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

    //Este método elimina la tupla preguntas dado un CodPrgCal.
    public function DltPrgCal($CodPrgCal)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_PrgCalDlt ?");

            $stm->execute(array($CodPrgCal));
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodPrgCal de la pregunta.
    public function UpdPrgCal($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_PrgCalUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtPg1PrgCal,
                        $data->TxtPg2PrgCal,
                        $data->TxtPg3PrgCal,
                        $data->TxtPg4PrgCal,
                        $data->TxtPg5PrgCal,
                        $data->TxtPg6PrgCal,
                        $data->TxtPg7PrgCal,
                        $data->TxtPg8PrgCal,
                        $data->TxtPg9PrgCal,
                        $data->TxtPg10PrgCal,
                        $data->TxtPg11PrgCal,
                        $data->TxtPg12PrgCal,
                        $data->TxtIndicador,
                        $data->TxtCodPrgCal
                    )
                );
                disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra una nueva pregunta a la tabla.
    public function RegPrgCal(preguntas $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_PrgCalReg ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtPg1PrgCal,
                    $data->TxtPg2PrgCal,
                    $data->TxtPg3PrgCal,
                    $data->TxtPg4PrgCal,
                    $data->TxtPg5PrgCal,
                    $data->TxtPg6PrgCal,
                    $data->TxtPg7PrgCal,
                    $data->TxtPg8PrgCal,
                    $data->TxtPg9PrgCal,
                    $data->TxtPg10PrgCal,
                    $data->TxtPg11PrgCal,
                    $data->TxtPg12PrgCal,
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

    public function ObtCrg()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_CrgObt");
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

    public function ObtPrf()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT * FROM Perfil");
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

