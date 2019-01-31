<?php

include "desconexion.php";

class cliente
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto cliente
    public $TxtIndicador;
    public $TxtCodCliCns;
    
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
	//cliente en caso de error se muestra por pantalla.
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
	
	//Este método obtiene los datos del cliente a partir del cod_cliente
	//utilizando SQL.
	public function Obtener($cod_cliente)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_cliente del cliente.
			$stm = $this->pdo->prepare("EXEC ups_Obtener_Clientes $cod_cliente");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_cliente.
			$stm->execute(array($cod_cliente));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();	

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla cliente dado un CodCli.
	public function DltCli($CodCli)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_Eliminar_Clientes $CodCli");

			$stm->execute(array($CodCli));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el CodCli del cliente.
	public function UpdCli($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_CliUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomCli,
				        $data->TxtDirCli,
				        $data->TxtTlfCli,
				        $data->TxtEmlCli,
				        $data->TxtEstCli,
				        $data->TxtCnsCli,
				        $data->TxtFupCli,
					    $data->TxtUupCli,
				        $data->TxtCodTip,
				        $data->TxtCodAct,
				        $data->TxtCodOgn,
				        $data->TxtCodCiu,
                        $data->TxtCodCli
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo cliente a la tabla.
	public function RegCli(cliente $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_CliReg ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 0";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtRucCli,
			        $data->TxtNomCli,
			        $data->TxtDirCli,
			        $data->TxtTlfCli,
			        $data->TxtEmlCli,
			        $data->TxtEstCli,
			        $data->TxtCnsCli,
			        $data->TxtFcrCli,
			        $data->TxtFupCli,
			        $data->TxtUcrCli,
				    $data->TxtUupCli,
			        $data->TxtCodTip,
			        $data->TxtCodAct,
			        $data->TxtCodOgn,
			        $data->TxtCodCiu,
			        $data->TxtIndicador,
			        $data->TxtCodCliCns,
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

	public function ValidarRucModel($datosModel){
		try
		{
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Cliente WHERE RucCli = :RucCli");
			$stm->bindParam(":RucCli", $datosModel, PDO::PARAM_INT);
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll();
			disconnect();
			
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
}