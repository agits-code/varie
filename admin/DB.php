<?php
class DB
{
    protected $pdo;


    protected function connect(){
        if (!$this->pdo) {
            $conf= require "config.php";
            $config=$conf['database'];
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



    public function query_all($sql)
    {

        // TODO: Parametro $query.
        //$sql = "SELECT file_name FROM $nome_archivio ORDER BY timestamp DESC ";
        return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    }
}
