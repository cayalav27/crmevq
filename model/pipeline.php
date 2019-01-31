<?php
class pipeline
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
    
    public function ListPipPrc($CodEmp)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PipListPrc $CodEmp");
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
    
    public function ListPipPrf($CodEmp, $CodPrf)
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $stm = $this->pdo->prepare("EXEC ups_PipFormListCal $CodEmp, $CodPrf");
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