<?php

include "desconexion.php";

class proveedor
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto proveedor
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
	//proveedor en caso de error se muestra por pantalla.
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

	//Este método elimina la tupla proveedor dado un CodProv.
	public function DltProv($CodProv)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_ProvDlt ?");

			$stm->execute(array($CodProv));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el CodProv del proveedor.
	public function UpdProv($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_ProvUpd ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomProv,
                        $data->TxtDirProv,
                        $data->TxtTlfProv,
                        $data->TxtEmlProv,
                        $data->TxtWebProv,
                        $data->TxtCodCiu,
				    	$data->TxtCodProv
					)
				);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	public function RegProv(proveedor $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_ProvReg ?, ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtRucProv,
                    $data->TxtNomProv,
                    $data->TxtDirProv,
                    $data->TxtTlfProv,
                    $data->TxtEmlProv,
                    $data->TxtWebProv,  
                    $data->TxtCodCiu,
                    $data->TxtIndicador,
                )
			);
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