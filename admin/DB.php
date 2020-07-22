<?php
class DB
{
    protected $pdo;

    protected function connect(){
        if (!$this->pdo) {
            $config= require "config.php";
            $config=$config['database'];
            try {
                $pdo = new PDO(
                    $config['connection'].';dbname='.$config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $this->pdo = $pdo;
            } catch (PDOException $e) {
                die("non connesso al db");
            }
        }
    }

    public function query($sql)
    {
        $this->connect();
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            echo $e->getMessage();
            die('query non funziona ....');
        }

    }
    public function query_one ($key,$nome_archivio){
        $sql= "SELECT * FROM $nome_archivio WHERE file_name='$key'";
        $cont = $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $cont[0];
    }

    public function query_all($nome_archivio)
    {
        $sql = "SELECT file_name FROM $nome_archivio";
        return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    }
}
