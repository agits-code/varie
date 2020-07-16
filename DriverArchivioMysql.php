<?php
class DriverArchivioMysql {

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

            $sql = "INSERT INTO $this->nome_archivio (file_name, file_content)
              VALUES (:file_name, :file_content)";

            if (!$this->exists($nome_file)) {

                try {
                    $statement = $this->pdo->prepare($sql);
                    $statement->execute(['file_name' => $nome_file, 'file_content' => $contenuto]);
                    //var_dump($statement);
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die('qualcosa non funziona ....');
                }
                echo "file aggiunto correttamente";
            } else {echo "file gìa esiste";}

    }
    public function delete($nome_file){

        $sql = "DELETE FROM new_arch WHERE file_name ='$nome_file'";
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            var_dump($e->getMessage());
        }
        echo "file cancellato correttamente"  ;
    }
    public function update($nome_file,$new_contenuto){
        $sql = "UPDATE new_arch SET file_content = '$new_contenuto' WHERE file_name = '$nome_file'";
        try {
         $statement=$this->pdo->prepare($sql);
         //var_dump($statement);
         $statement->execute();
            } catch (PDOException $e){
               var_dump($e->getMessage());
            }
         echo "file aggiornato correttamente"  ;
    }
    public function get($key){

            try {
                $statment = $this->pdo->prepare("SELECT file_content FROM $this->nome_archivio WHERE file_name='$key'");
                $statment->execute();
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }

            $cont = $statment->fetchAll(PDO::FETCH_COLUMN);
            return $cont[0];

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

    /**
     * @return mixed
     */
    public function exists($nome_file)
    {
        $statment = $this->pdo->prepare("SELECT file_content FROM $this->nome_archivio WHERE file_name='$nome_file'");
       return $statment->execute();
    }
}