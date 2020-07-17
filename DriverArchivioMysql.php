<?php
class DriverArchivioMysql implements DriverArchivio {

    public function __construct ($nome_archivio){

        try {
            $pdo = new PDO(
                'mysql:host=127.0.0.1;dbname=MioArchivio', 'root', 'lampolampo'
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e){
            die("qualcosa non ha funzionato");
            }
        $this->pdo= $pdo;
        $this->nome_archivio = $nome_archivio;


    }
    public  function insert($nome_file,$contenuto){

             if ($this->exists($nome_file)) {
                 $sql = "INSERT INTO $this->nome_archivio (file_name, file_content)
                         VALUES ('$nome_file', '$contenuto')";
                try {
                    $statement = $this->pdo->prepare($sql);
                    //$statement->execute(['file_name' => $nome_file, 'file_content' => $contenuto]);
                    $statement->execute();
                    //var_dump($statement);
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die('qualcosa non funziona ....');
                }
                echo "file aggiunto correttamente";
            } else {echo "file gìa esiste";}

    }
    public function delete($nome_file){
        if ($this->exists($nome_file)) {
            $sql = "DELETE FROM $this->nome_archivio WHERE file_name ='$nome_file'";
            try {
                $statement = $this->pdo->prepare($sql);
                $statement->execute();

            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
            echo "file cancellato correttamente"  ;
        } else {echo "file non esiste"  ;}
    }
    public function update($nome_file,$new_contenuto){
        if (!$this->exists($nome_file)) {
            echo "file non esiste";
            die();
        } else
        {

            $sql = "UPDATE new_arch SET file_content = '$new_contenuto' WHERE file_name = '$nome_file'";
            try {
                $statement = $this->pdo->prepare($sql);
                //var_dump($statement);
                $statement->execute();
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
            echo "file aggiornato correttamente";
        }
    }
    public function get($key){
            if ($this->exists($key)) {
                try {
                    $statment = $this->pdo->prepare("SELECT file_content FROM $this->nome_archivio WHERE file_name='$key'");
                    $statment->execute();
                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                }

                $cont = $statment->fetchAll(PDO::FETCH_COLUMN);
                return $cont[0];
            } else {echo "file non esiste";die();}
    }
    public  function lista(){
        try {
        $statment=$this->pdo->prepare("SELECT file_name FROM $this->nome_archivio");
        $statment->execute();
         } catch (PDOException $e){
               var_dump($e->getMessage());
         }
        return $statment->fetchAll(PDO::FETCH_COLUMN);

    }

    public function exists($nome_file)
    {
        $statment = $this->pdo->prepare("SELECT * FROM $this->nome_archivio WHERE file_name='$nome_file'");
        $ok= $statment->fetchAll(PDO::FETCH_OBJ);
        var_dump($ok);
        if (count($ok)>0){
            return true;
        } else {
            return false;
        };

    }
}