<?php

include "desconexion.php";

class detallemkt
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

	public function ListDetAte($CodMrk)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodMrk de la venta.
			$stm = $this->pdo->prepare("EXEC ups_DetAteList ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodMrk.
			$stm->bindParam(1, $CodMrk, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function RegDetAte(detallemkt $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_DetAteReg ?, ?, ?, ?, ?, ?, ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->TxtFecDetAte,
			        $data->TxtFcrDetAte,
			        $data->TxtFupDetAte,
        	        $data->TxtRptDetAte,
        	        $data->TxtReiDetAte,
        	        $data->TxtComDetAte,
        	        $data->TxtCodMrk,
        	        $data->TxtCodEmp,
                    $data->TxtIndicador,
                )
			);
		    disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdDetAte($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_DetAteUpd ?, ?, ?, ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TxtFecDetAte,
				        $data->TxtFupDetAte,
	        	        $data->TxtRptDetAte,
	        	        $data->TxtReiDetAte,
	        	        $data->TxtComDetAte,
	        	        $data->TxtCodMrk,
	        	        $data->TxtCodDetAte
					)
				);
			     disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//utilizando SQL.
	public function ObtMkt($CodMrk)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el CodMrk de la venta.
			$stm = $this->pdo->prepare("EXEC ups_MktObt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro CodMrk.
			$stm->execute(array($CodMrk));
			return $stm->fetch(PDO::FETCH_OBJ);
			disconnect();

		} catch (Exception $e)
		{
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

    public function ListTipInf()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_TipInfList");
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

    public function ListCan()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_CanList");
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

    public function ListDiv()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_DivList");
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
    
    public function ListEmp()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT e.CodEmp, e.CodPrf, p.NomPrf, 
						            	(
										CASE e.CodEmp
											WHEN 1 THEN 'Fuera de Alcance'
                                            WHEN 10 THEN 'Todos'
											ELSE e.ApeEmp+', '+e.NomEmp 
										END
										) as NomEmp
                                        FROM Empleado e
                                        INNER JOIN Perfil p
                                        ON p.CodPrf = e.CodPrf
                                        INNER JOIN Cargo c
                                        ON p.CodCrg = c.CodCrg
                                        WHERE e.Indicador = 1 and p.Indicador = 1 and c.Indicador = 1
                                        ORDER BY ApeEmp ASC");
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