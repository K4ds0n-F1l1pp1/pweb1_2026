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

    public function all()
    {
        $sql = "SELECT * FROM $this->table_name";
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function deleteUser()
    {
        if (isset($_GET['action']) && $_GET['action'] === 'deleteUser' && isset($_GET['id'])) 
        {
            $idDeleted = $_GET['id'];
            
            try {
                $sql = "DELETE FROM $this->table_name WHERE id = :id";
                $statement = $this->conn->prepare($sql);

                $statement->bindParam(':id', $idDeleted, PDO::PARAM_INT);
                $statement->execute();

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();

            } catch (PDOException $e) {
                echo "Erro ao excluir no banco de dados: " . $e->getMessage();
                exit();
            }
        }
    }

    public function search($dados)
    {
        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        try {
            $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";
            $statement = $this->conn->prepare($sql);
            $statement->execute(["%$valor%"]);
        } catch (PDOException $e) {
                echo "Erro ao buscar no banco de dados: " . $e->getMessage();
                exit();
        }

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table_name WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([$id]);

        return $statement->fetchObject();
    }

    public function findBy($campo, $valor)
    {
        $sql = "SELECT * FROM $this->table_name WHERE $campo = ?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([$valor]);

        return $statement->fetchObject();
    }

    public function update($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];
        $sep = "";

        foreach ($dados as $campo => $valor)
        {
            if ($campo !== 'id')
            {
                $campos .= $sep . $campo;
                $marcadores .= $sep . "?";
                $vetorData[] = $valor;
                $sep = ",";
            }
        }

        try 
        {
            $vetorData[] = $dados['id'];
            $sql = "UPDATE $this->table_name SET $campos = $marcadores WHERE id = ?;";
            $statement = $this->conn->prepare($sql);

            $statement->execute($vetorData);
        } catch (PDOException $e) {
            var_dump("Erro ao inserir. ", $e->getMessage());
        }
        
    }

}