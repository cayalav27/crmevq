<?php

include "desconexion.php";

class quarter
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
	//quarter en caso de error se muestra por pantalla.
	public function ListQua()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_QuaList");
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

	//Este método elimina la tupla contacto dado un CodQua.
	public function DltQua($CodQua)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_QuaDlt ?");

			$stm->execute(array($CodQua));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el cod_quarter del CONTACTO.
	public function UpdQua($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_QuaUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtQ1IQua,
				        $data->TxtQ1FQua,
				        $data->TxtQ2IQua,
				        $data->TxtQ2FQua,
				        $data->TxtQ3IQua,
				        $data->TxtQ3FQua,
				        $data->TxtQ4IQua,
				        $data->TxtQ4FQua,
				        $data->TxtIndicador,
                        $data->TxtCodQua
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo cliente a la tabla.
	public function RegQua(quarter $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_QuaReg ?, ?, ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtQ1IQua,
			        $data->TxtQ1FQua,
			        $data->TxtQ2IQua,
			        $data->TxtQ2FQua,
			        $data->TxtQ3IQua,
			        $data->TxtQ3FQua,
			        $data->TxtQ4IQua,
			        $data->TxtQ4FQua,
			        $data->TxtIndicador,
                )
			);
		    disconnect();
		    
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	
}