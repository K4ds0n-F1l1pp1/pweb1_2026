<?php

class db {

    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $port     = '3306';
    private $dbname   = 'db_pweb1_2026_1';
    private $table_name;
    private $conn;

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect();
    }

    private function connect()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }

    public function store($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];
        $sep = "";

        foreach ($dados as $campo => $valor)
        {
            $campos .= $sep . $campo;
            $marcadores .= $sep . "?";
            $vetorData[] = $valor;
            $sep = ",";
        }

        try 
        {
            $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores);";
            $statement = $this->conn->prepare($sql);

            $statement->execute($vetorData);
        } catch (PDOException $e) {
            var_dump("Erro ao inserir. ", $e->getMessage());
        }
        
    }

}