<?php

include "desconexion.php";

class empleado
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
	//empleado en caso de error se muestra por pantalla.
	public function ListEmp()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_EmpList");
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

	//Este método elimina la tupla empleado dado un cod_empleado.
	public function DltEmp($CodEmp)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_EmpDlt ?");

			$stm->execute(array($CodEmp));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el codempleado delempleado.
	public function UpdEmp($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_EmpUpd ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomEmp,
	                    $data->TxtApeEmp,
	                    $data->TxtEmlEmp,
	                    $data->TxtGnrEmp,
	                    $data->TxtFotEmp,
	                    $data->TxtUsuEmp,
	                    $data->TxtPswEmp,
	                    $data->TxtCodPrf,
	                    $data->TxtCodSrc,
                    	$data->TxtCodDiv,
                        $data->TxtCodEmp
					)
				);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevoempleado a la tabla.
	public function RegEmp(empleado $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_EmpReg ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtDniEmp,
                    $data->TxtNomEmp,
                    $data->TxtApeEmp,
                    $data->TxtEmlEmp,
                    $data->TxtGnrEmp,
                    $data->TxtFotEmp,
                    $data->TxtUsuEmp,
                    $data->TxtPswEmp,
                    $data->TxtCodPrf,
                    $data->TxtCodSrc,
                    $data->TxtCodDiv,
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

	public function ObtDiv()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Divisiones WHERE Indicador = 1");
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
	
	public function ObtSrc()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_SrcObt");
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