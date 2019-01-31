<?php

include "desconexion.php";

class producto
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
	//producto en caso de error se muestra por pantalla.
	public function ListDetProv($CodPrf)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_MrcDetProvObt $CodPrf");
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

	public function ObtMrcDetProd($CodPrf)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_MrcDetProvObt ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->execute(array($CodPrf));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListProd($CodDetMrc, $CodPrf)
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("EXEC ups_ProdList $CodDetMrc, $CodPrf");
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

	public function ObtMrcProd($CodDetMrc)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el cod_seguimiento de la venta.
            $stm = $this->pdo->prepare("EXEC ups_ProdMrc ?");
            //Ejecución de la sentencia SQL utilizando el parámetro cod_seguimiento.
            $stm->execute(array($CodDetMrc));
            return $stm->fetch(PDO::FETCH_OBJ);
            disconnect();

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}