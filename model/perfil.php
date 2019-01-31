<?php

include "desconexion.php";

class perfil
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
	//perfil en caso de error se muestra por pantalla.
	public function ListPrf($CodCrg)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_seguimiento de la venta.
			$stm = $this->pdo->prepare("EXEC ups_PrfList ?");
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

	//Este método elimina la tupla perfil dado un cod_perfil.
	public function DltPrf($CodPrf)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_PrfDlt ?");

			$stm->execute(array($CodPrf));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el codperfil delperfil.
	public function UpdPrf($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_PrfUpd ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtNomPrf,
                        $data->TxtEqpPrf,
                        $data->TxtCodCrg,
                        $data->TxtIndicador,
                        $data->TxtCodPrf
					)
				);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevoperfil a la tabla.
	public function RegPrf(perfil $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_PrfReg ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtNomPrf,
                    $data->TxtEqpPrf,
                    $data->TxtCodCrg,
                    $data->TxtIndicador,
                )
			);
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
			$stm = $this->pdo->prepare("SELECT * FROM Cargo WHERE CodCrg = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
			$stm->execute(array($CodCrg));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

}