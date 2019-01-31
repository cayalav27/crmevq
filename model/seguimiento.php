<?php

include "desconexion.php";

class seguimiento
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
										WHERE e.CodPrf in (14,15,16,17) and e.Indicador = 1 and p.Indicador = 1
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
										WHERE e.CodPrf in (5,6,7,19) and e.Indicador = 1 and p.Indicador = 1
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

	public function SegListEmp1JIAL($FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp1JIAL ?, ?");
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

    public function SegListEmp2JIAL($FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp2JIAL ?, ?, ?");
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

    public function SegListEmp3($CodEmp, $CodPrf, $FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp3 ?, ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_INT);
            $stm->bindParam(2, $CodPrf, PDO::PARAM_INT);
            $stm->bindParam(3, $FIni, PDO::PARAM_STR);
            $stm->bindParam(4, $FFin, PDO::PARAM_STR);
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

    public function SegListEmp4($CodEmp, $CodPrf, $FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp4 ?, ?, ?, ?, ?");
            //Ejecución de la sentencia SQL.
            $stm->bindParam(1, $CodEmp, PDO::PARAM_INT);
            $stm->bindParam(2, $CodPrf, PDO::PARAM_INT);
            $stm->bindParam(3, $FIni, PDO::PARAM_STR);
            $stm->bindParam(4, $FFin, PDO::PARAM_STR);
            $stm->bindParam(5, $Indicador, PDO::PARAM_STR);
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

    public function SegListEmp1JCC($FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp1JCC ?, ?");
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

    public function SegListEmp2JCC($FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp2JCC ?, ?, ?");
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

    public function SegListEmp1Ge($FIni, $FFin)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp1Ge ?, ?");
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

    public function SegListEmp2Ge($FIni, $FFin, $Indicador)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListEmp2Ge ?, ?, ?");
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



    //Este método selecciona todas las tuplas de la tabla
    //Seguimiento venta  en caso de error se muestra por pantalla.
    public function ListPipCal($CodEmp, $CodPrf)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PipListCal $CodEmp, $CodPrf");
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

    public function ListPipPrc($CodVnt)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListPrc $CodVnt");
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

    public function ListSegCli($CodCli)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListCli $CodCli");
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

    public function ListSegForm($CodVnt)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_SegListForm $CodVnt");
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

    public function ListDurVnt($CodVnt)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_ListDurVnt $CodVnt");
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