<?php
class ArchivioDocumenti {

    public function __construct ($nome_archivio){

        try {
            $this->pdo = new PDO(
                'mysql:host=127.0.0.1;dbname=MioArchivio', 'root', 'lampolampo'
            );
            } catch (PDOException $e){
            die("qualcosa non ha funzionato");
            }
        $this->nome_archivio = $nome_archivio;


    }
    public  function add($nome_file,$contenuto){


       $sql = "INSERT INTO $this->nome_archivio (file_name, file_content) VALUES (:file_name, :file_content)";
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute(['file_name' => $nome_file, 'file_content' => $contenuto]);
            } catch (Exception $e){
               die('qualcosa non funziona ....');
            }

    }
    public function del($nome_file){

        $sql = "DELETE FROM new_arch WHERE file_name ='$nome_file'";
        try {
            $statement=$this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('qualcosa non funziona ....');
        }
    }
    public function edit($nome_file,$new_contenuto){
        $sql = "UPDATE new_arch SET file_content = '$new_contenuto'
                  WHERE file_name = '$nome_file'";
        try {
         $statement=$this->pdo->prepare($sql);
         $statement->execute();
            } catch (Exception $e){
               die('qualcosa non funziona ....');
            }
    }
    public function get($key){
        $this->statment=$this->pdo->prepare("select file_content from $this->nome_archivio where file_name='$key'");
        $this->statment->execute();
        $cont= $this->statment->fetchAll(PDO::FETCH_COLUMN);
        return $cont[0];
    }
    public  function lista(){

        $this->statment=$this->pdo->prepare("select file_name from $this->nome_archivio");
        $this->statment->execute();
        return $this->statment->fetchAll(PDO::FETCH_COLUMN);

    }
}