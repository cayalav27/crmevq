<?php

include "desconexion.php";

class contacto
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
	//contacto en caso de error se muestra por pantalla.
	public function ListCont($CodCli)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodCli de la venta.
			$stm = $this->pdo->prepare("EXEC ups_ContList ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodCli.
			$stm->bindParam(1, $CodCli, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtCli($CodCli)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodCli del cliente.
			$stm = $this->pdo->prepare("EXEC ups_CliObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodCli.
			$stm->execute(array($CodCli));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();	

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla contacto dado un CodCont.
	public function DltCont($CodCont)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_ContDlt ?");

			$stm->execute(array($CodCont));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el CodCont del CONTACTO.
	public function UpdCont($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_ContUpd ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomCont,
				        $data->TxtAreCont,
				        $data->TxtCrgCont,
				        $data->TxtTlfCont,
				        $data->TxtEmlCont,
                        $data->TxtCodCont
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo cliente a la tabla.
	public function RegCont(contacto $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_ContReg ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtNomCont,
			        $data->TxtAreCont,
			        $data->TxtCrgCont,
			        $data->TxtTlfCont,
			        $data->TxtEmlCont,
			        $data->TxtCodCli,   
                    $data->TxtIndicador,
                     )
			);
		    disconnect();
		    
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtTip()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_TipObt");
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

	public function ObtAct()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_ActObt");
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

	public function ObtPais()
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

	public function ObtCiu()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Ciudad WHERE Indicador = 1");
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