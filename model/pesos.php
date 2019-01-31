<?php

include "desconexion.php";

class pesos
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

    public function ListPesCal()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PesCalList");
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

    //Este método elimina la tupla preguntas dado un CodPesCal.
    public function DltPesCal($CodPesCal)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $stm = $this->pdo
                        ->prepare("EXEC ups_PesCalDlt ?");

            $stm->execute(array($CodPesCal));
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el CodPesCal del CONTACTO.
    public function UpdPesCal($data)
    {
        try
        {
            //Sentencia SQL para actualizar los datos.
            $sql = "EXEC ups_PesCalUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->TxtPs1PesCal,
                        $data->TxtPs2PesCal, 
                        $data->TxtPs3PesCal, 
                        $data->TxtPs4PesCal, 
                        $data->TxtPs5PesCal, 
                        $data->TxtPs6PesCal, 
                        $data->TxtPs7PesCal, 
                        $data->TxtPs8PesCal, 
                        $data->TxtPs9PesCal, 
                        $data->TxtPs10PesCal,
                        $data->TxtPs11PesCal, 
                        $data->TxtPs12PesCal,
                        $data->TxtIndicador,
                        $data->TxtCodPesCal
                    )
                );
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo cliente a la tabla.
    public function RegPesCal(pesos $data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "EXEC ups_PesCalReg ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->TxtPs1PesCal,
                    $data->TxtPs2PesCal, 
                    $data->TxtPs3PesCal, 
                    $data->TxtPs4PesCal, 
                    $data->TxtPs5PesCal, 
                    $data->TxtPs6PesCal, 
                    $data->TxtPs7PesCal, 
                    $data->TxtPs8PesCal, 
                    $data->TxtPs9PesCal, 
                    $data->TxtPs10PesCal,
                    $data->TxtPs11PesCal, 
                    $data->TxtPs12PesCal,
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