<?php

class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "dica";
        $dbname = "task_manager";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
