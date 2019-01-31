<?php

include "desconexion.php";

class marcaproducto
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
	//Detalle de producto en caso de error se muestra por pantalla.
	public function ListMrcProd($CodDetMrc)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcProdList ?");
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

	//Este método elimina la tupla producto dado un CodMrcPrf.
	public function DltMrcProd($CodMrcPrf)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_MrcProdDlt ?");

			$stm->execute(array($CodMrcPrf));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el cod_linea_perfil del producto.
	public function UpdMrcProd($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_MrcProdUpd ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->TxtFabProd,
                        $data->TxtNomProd,
	                    $data->TxtPrcProd,
	                    $data->TxtIndicador,
                        $data->TxtCodProd
					)
				);
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo lineaperfil a la tabla.
	public function RegMrcProd(marcaproducto $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_MrcProdReg ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->TxtFabProd,
                    $data->TxtNomProd,
                    $data->TxtPrcProd,
                    $data->TxtCodDetMrc,
                    $data->TxtIndicador,
                )
			);
		    disconnect();
		    
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtMrcDet($CodDetMrc)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcDetObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->execute(array($CodDetMrc));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    
    public function ListCrg()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM Cargo WHERE Indicador = 1");
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

	public function ListPrf()
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