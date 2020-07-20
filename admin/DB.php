<?php
class DB
{
    protected $pdo;
    protected function connect(){

        if (!isset($this->pdo)) {
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
            } catch (PDOException $e) {
                die("qualcosa non ha funzionato");
            }
            $this->pdo = $pdo;
        }
    }

    public function query($sql)
    {
        $this->connect();
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die('qualcosa non funziona ....');
        }
        return $statement;
    }

    public function query_all($nome_archivio)
    {
        $sql = "SELECT file_name FROM $nome_archivio";
        return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    }
}
