<?php

include "desconexion.php";

class equipomkt
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto factor
    public $indicador;

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
	//factor en caso de error se muestra por pantalla.
	public function ListEqpMkt($CodMrk)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el cod_cliente de la venta.
			$stm = $this->pdo->prepare("EXEC ups_EqpListMkt ?");
			//Ejecución de la sentencia SQL utilizando el parámetro cod_cliente.
			$stm->bindParam(1, $CodMrk, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetchAll();
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla contacto dado un codigo de equipo.
	public function DltEqp($CodEqp)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("EXEC ups_EqpDlt ?");

			$stm->execute(array($CodEqp));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function UpdActEqp($CodEqp)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("UPDATE Equipo SET Indicador = 1 WHERE CodEqp = $CodEqp");

			$stm->execute(array($CodEqp));
			disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el codigo de equipo del CONTACTO.
	public function UpdEqp($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "EXEC ups_EqpUpd ?, ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
	                    $data->TxtCodEmp,
                        $data->TxtCodEqp
					)
				);
				disconnect();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo cliente a la tabla.
	public function RegEqp(equipomkt $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "EXEC ups_EqpReg ?, ?, 1";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
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