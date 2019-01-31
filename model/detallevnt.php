<?php

include "desconexion.php";

class detallevnt
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto seguimiento-venta
	public $TxtIndicador;
	public $TxtEstDetTot;

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

	public function RegDetVnt(detallevnt $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_DetVntReg ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtCntDetVnt,
			        $data->TxtCodProd,
			        $data->TxtCodVnt,
        	        $data->TxtCodFac,
        	        $data->TxtCodTpCmb,
        	        $data->TxtCodDsc,
                    $data->TxtIndicador,
                )
			);
		    disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdDetVnt($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_DetVntUpd ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtCntDetVnt,
	        	        $data->TxtCodFac,
	        	        $data->TxtCodTpCmb,
        	        	$data->TxtCodDsc,
                        $data->TxtCodDetVnt
					)
				);
			     disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdDetTot($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE Detalle_Total SET SbTDetTot = ?
					 WHERE CodDetTot =  ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtSubTotal,
                        $data->TxtCodDetTot
					)
				);
			     disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListDetTot($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetTotList ?");
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

	public function UpdDetTotAut($CodDetTot)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE Detalle_Total SET EstDetTot = 1 WHERE CodDetTot = $CodDetTot");

			$stm->execute(array($CodDetTot));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdDetTotMnl($CodDetTot)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE Detalle_Total SET EstDetTot = 0 WHERE CodDetTot = $CodDetTot");

			$stm->execute(array($CodDetTot));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListDetVnt($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetVntList ?");
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

	public function ListDetVntSub($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetVntSub ?");
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

	public function ListDetVntIGV($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetVntIGV ?");
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

	public function ListDetVntTot($CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetVntTot ?");
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

	//Este método elimina la tupla producto dado un cod_det_seguimiento.
	public function DltDetVnt($CodDetVnt)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_DetVntDlt ?");

			$stm->execute(array($CodDetVnt));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdActDetVnt($CodDetVnt)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE Detalle_Venta SET Indicador = 1 WHERE CodDetVnt = $CodDetVnt");

			$stm->execute(array($CodDetVnt));
			disconnect();

		} catch (Exception $e)
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

	public function ObtDetVntProd($CodDetVnt, $CodVnt)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodVnt de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetVntProdObt ?, ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodVnt.
			$stm->execute(array($CodDetVnt,$CodVnt));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
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


	public function ObtFac()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_FacObt");
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

	public function ListTpCmb()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Tp_Cambio WHERE Indicador = 1");
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

	public function ListDsc()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Descuento WHERE Indicador = 1");
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
	
}