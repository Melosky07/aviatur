<?php

class ServicioTablaInfo
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function GetInfoTabla()
    {
        $query = "SELECT * FROM cartera";
        $consulta = mysqli_query($this->conexion, $query);
        if ($consulta) {
            $resultados = mysqli_fetch_all($consulta);
            // $resultados = array("response" => true, "body" => $resultados);
        } else {
            $resultados = array("response" => false, "body" => [""]);
        }
        return $resultados;
    }

    public function GetDatoDoc($id)
    {
        $query = "SELECT * FROM davivienda8515 WHERE doc = $id";
        $consulta = mysqli_query($this->conexion, $query);
        if ($consulta) {
            $resultados = mysqli_fetch_all($consulta);
            // $resultados = array("response" => true, "body" => $resultados);
        } else {
            $resultados = array("response" => false, "body" => [""]);
        }
        return $resultados;
    }

    public function GetContactInfo($id)
    {
        $query = "SELECT DISTINCT nit, razon_social, contacto, correo FROM datoscontacto WHERE nit = $id";
        $consulta = mysqli_query($this->conexion, $query);
        if ($consulta) {
            $resultados = mysqli_fetch_all($consulta);
            // $resultados = array("response" => true, "body" => $resultados);
        } else {
            $resultados = array("response" => false, "body" => [""]);
        }
        return $resultados;
    }

    public function GetCustomer($id)
    {
        $query = "SELECT documento, fecha, moneda, saldo_finalB, motivo, dias_factura FROM cartera WHERE nit = $id";
        // $query = "SELECT * FROM datoscontacto";
        $consulta = mysqli_query($this->conexion, $query);
        if ($consulta) {
            $resultados = mysqli_fetch_all($consulta);
            // $resultados = array("response" => true, "body" => $resultados);
        } else {
            $resultados = array("response" => false, "body" => [""]);
        }
        return $resultados;
    }

    public function GetResumen($id)
    {
        $query = "SELECT saldo_total, no_facturas FROM resumen WHERE nit = $id";
        // $query = "SELECT * FROM datoscontacto";
        $consulta = mysqli_query($this->conexion, $query);
        if ($consulta) {
            $resultados = mysqli_fetch_all($consulta);
            // $resultados = array("response" => true, "body" => $resultados);
        } else {
            $resultados = array("response" => false, "body" => [""]);
        }
        return $resultados;
    }
}
