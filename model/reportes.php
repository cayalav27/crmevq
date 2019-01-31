<?php

include "desconexion.php";

class reportes
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
	//quarter en caso de error se muestra por pantalla.
	public function ListEmpIAL()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT e.CodEmp, e.NomEmp + ' '+ e.ApeEmp as NomApeEmp, e.CodPrf, p.NomPrf
										FROM Empleado e
										INNER JOIN Perfil p
										ON p.CodPrf = e.CodPrf
										WHERE e.CodPrf in (14,15,16,17)");
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

	public function ListEmpCC()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT e.CodEmp, e.NomEmp + ' '+ e.ApeEmp as NomApeEmp, e.CodPrf, p.NomPrf
										FROM Empleado e
										INNER JOIN Perfil p
										ON p.CodPrf = e.CodPrf
										WHERE e.CodPrf in (5,6,7,19)");
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

    public function ListEmpGe()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("SELECT e.CodEmp, e.NomEmp + ' '+ e.ApeEmp as NomApeEmp, e.CodPrf, p.NomPrf
                                        FROM Empleado e
                                        INNER JOIN Perfil p
                                        ON p.CodPrf = e.CodPrf
                                        INNER JOIN Cargo c
                                        ON p.CodCrg = c.CodCrg
                                        WHERE c.CodCrg = 4 and e.Indicador = 1 and p.Indicador = 1 and c.Indicador = 1
                                        ORDER BY NomApeEmp ASC");
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

	public function RepListEft($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RepListEft ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RepEstEft($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RepEstEft ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RepEstNOEft($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RepEstNOEft ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RepEstCount1($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RepEstCount1 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RepEstCount2($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RepEstCount2 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RentList1($FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentList1 ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $FIni, PDO::PARAM_STR);
            $stm->bindParam(2, $FFin, PDO::PARAM_STR);
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

    public function RentList2($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentList2 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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

    public function RentList3($FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentList3 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $FIni, PDO::PARAM_STR);
            $stm->bindParam(2, $FFin, PDO::PARAM_STR);
            $stm->bindParam(3, $Indicador, PDO::PARAM_STR);
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

    public function RentList4($CodEmp, $FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentList4 ?, ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
            $stm->bindParam(4, $Indicador, PDO::PARAM_STR);
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

    public function RentGraf1($FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentGraf1 ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $FIni, PDO::PARAM_STR);
            $stm->bindParam(2, $FFin, PDO::PARAM_STR);
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

    public function RentGraf2($CodEmp, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentGraf2 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
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


    public function RentGraf3($FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentGraf3 ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $FIni, PDO::PARAM_STR);
            $stm->bindParam(2, $FFin, PDO::PARAM_STR);
            $stm->bindParam(3, $Indicador, PDO::PARAM_STR);
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

    public function RentGraf4($CodEmp, $FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_RentGraf4 ?, ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_STR);
            $stm->bindParam(2, $FIni, PDO::PARAM_STR);
            $stm->bindParam(3, $FFin, PDO::PARAM_STR);
            $stm->bindParam(4, $Indicador, PDO::PARAM_STR);
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

    public function ListDetVnt($CodVnt)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el CodVnt de la venta.
            $stm = $this->pdo->prepare("EXEC ups_DetVntObt ?");
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

    public function check_in_range($start_date, $end_date, $evaluame) 
    { 
        try {
            $start_ts = strtotime($start_date);
            $end_ts = strtotime($end_date);
            $user_ts = strtotime($evaluame); 
            return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));

        } catch (Exception $e) {
            //Obtener mensaje de error.
            die($e->getMessage());
        }
        
    }

}