<?php

include "desconexion.php";

class agenda
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

	public function ListAgn($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_AgnList ?");
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

	public function ObtVnt($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_VntObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodVnt.
			$stm->execute(array($CodVnt));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtVntAgn($CodAgn)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodAgn de la venta.
			$stm = $this->pdo->prepare("EXEC ups_AgnVntObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodAgn.
			$stm->execute(array($CodAgn));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function RegAgn(agenda $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_AgnReg ?, ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtFIniAgn,
			        $data->TxtFFinAgn,
			        $data->TxtDscTAgn,
			        $data->TxtDscFAgn,
			        $data->TxtCodVnt,
			        $data->TxtCodAvn,
			        $data->TxtCodStk,
			        $data->TxtIndicador,
                )
			);
		    disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdAgn($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_AgnUpd ?, ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
	                    $data->TxtFIniAgn,
				        $data->TxtFFinAgn,
				        $data->TxtDscTAgn,
				        $data->TxtDscFAgn,
				        $data->TxtCodAvn,
				        $data->TxtCodStk,
	                    $data->TxtCodAgn
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla producto dado un CodAgn.
	public function DltAgn($CodAgn)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_AgnDlt ?");

			$stm->execute(array($CodAgn));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtRol()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_RolObt");
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

	public function ObtStk()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Stakeholder WHERE Indicador = 1");
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

	// calendario

	public function ListCalendar($CodEmp)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_AgnCaleList $CodEmp");
            //Ejecución de la sentencia SQL.
            $stm->execute();
            //fetchAll — Devuelve un array que contiene todas las filas del conjunto
            //de resultados
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
    }

	public function UpdCalFec($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_AgnCaleFecUpd ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
	                    $data->FIniAgn,
				        $data->FFinAgn,
	                    $data->CodAgn
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdCalSiz($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_AgnCaleSizUpd ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				        $data->FFinAgn,
	                    $data->CodAgn
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}