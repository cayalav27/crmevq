<?php

include "../model/desconexion.php";
require_once "../model/database.php";

class ajax
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


	public function ObtCiu($CodPais)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_CiuObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodPais, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtCrg($CodCrg)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_CrgObtAjx ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodCrg, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtProd($CodDetMrc)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_ProdObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodDetMrc, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtCont($CodCli)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_ContObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodCli, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtEmp($cod_cargo)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_EmpObtAjx ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $cod_cargo, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function StkObt($CodRol, $CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_StkObt ?, ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodRol, PDO::PARAM_INT);
			$stm->bindParam(2, $CodVnt, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function EmpObt($CodEmp)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("SELECT e.CodPrf, p.NomPrf
										FROM Empleado e
										INNER JOIN Perfil p
										ON p.CodPrf = e.CodPrf
										WHERE e.CodEmp = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodEmp, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtDiv($CodDiv)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DivObtAjx ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->bindParam(1, $CodDiv, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

}
