<?php

include "desconexion.php";

class calificacionvnt
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto seguimiento-venta
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

	//Método que actualiza una tupla a partir de la clausula
	//Where y el cod_contacto del CONTACTO.
	public function UpdCalVnt($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_CalVntUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtCl1CalVnt,
				        $data->TxtCl2CalVnt,
				        $data->TxtCl3CalVnt,
				        $data->TxtCl4CalVnt,
				        $data->TxtCl5CalVnt,
				        $data->TxtCl6CalVnt,
				        $data->TxtCl7CalVnt,
				        $data->TxtCl8CalVnt,
				        $data->TxtCl9CalVnt,
				        $data->TxtCl10CalVnt,
				        $data->TxtCl11CalVnt,
				        $data->TxtCl12CalVnt,
                        $data->TxtCodCalVnt
                        
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function ListCalVnt($CodCalVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodCalVnt del contacto.
			$stm = $this->pdo->prepare("EXEC ups_CalVntList ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodCalVnt.
			$stm->execute(array($CodCalVnt));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtPrgCal($CodPrf)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_PrgCalObt $CodPrf");
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

	// MODIFICACION DE INFO VENTA

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

	public function ListCont()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Contacto WHERE Indicador = 1");
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

	public function ObtAvn()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_AvnObt");
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

	public function ObtEstVnt()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_EstVntObt");
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

	public function ObtProdList($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_VntProdObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodVnt.
			$stm->bindParam(1, $CodVnt, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
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
}
