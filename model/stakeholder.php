<?php

include "desconexion.php";

class stakeholder
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto stakeholder
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

	//Este método obtiene los datos de la Venta a partir del CodVnt
	//utilizando SQL.
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

	public function ListStk($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_StkList ?");
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

	//Este método elimina la tupla contacto dado un CodStk.
	public function DltStk($CodStk)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_StkDlt ?");

			$stm->execute(array($CodStk));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdActStk($CodStk)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE Stakeholder SET Indicador = 1 WHERE CodStk = $CodStk");

			$stm->execute(array($CodStk));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el CodStk del CONTACTO.
	public function UpdStk($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_StkUpd ?, ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomStk,
        		        $data->TxtTlfStk,
        		        $data->TxtCrgStk,
        		        $data->TxtCodRol,
        		        $data->TxtCodCli,
                        $data->TxtCodStk

					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo cliente a la tabla.
	public function RegStk(stakeholder $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_StkReg ?, ?, ?, ?, ? ,? , 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtNomStk,
    		        $data->TxtTlfStk,
    		        $data->TxtCrgStk,
    		        $data->TxtCodRol,
    		        $data->TxtCodVnt,
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
	
}