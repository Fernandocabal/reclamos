<?php
class Database
{
    private $host = "localhost";
    private $db_name = "reclamos_awaterra";
    private $username = "root";
    private $password = "";
    public function getConnection()
    {
        $host = "mysql:host={$this->host};dbname={$this->db_name}";
        try {
            $conexion = new PDO($host, $this->username, $this->password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }
}
