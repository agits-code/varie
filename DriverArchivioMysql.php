<?php
class DriverArchivioMysql implements DriverArchivio {

    public function __construct ($nome_archivio){

        $this->nome_archivio=$nome_archivio;
        $this->DB= new DB();

    }
    public  function insert($nome_file,$contenuto){

             if (!$this->exists($nome_file)) {
                 $sql = "INSERT INTO $this->nome_archivio (file_name, file_content)
                         VALUES ('$nome_file', '$contenuto')";

                 $this->DB->query($sql);
                echo "file aggiunto correttamente";
             } else {echo "file gìa esiste";}
       // header('Location: index.php' );
    }
    public function delete($nome_file){
        if ($this->exists($nome_file)) {
            $sql = "DELETE FROM $this->nome_archivio WHERE file_name ='$nome_file'";
            $this->DB->query($sql);
            echo "file cancellato correttamente"  ;
        } else {echo "file non esiste"  ;}
    }
    public function update($nome_file,$new_contenuto){
        if ($this->exists($nome_file))
        {
            $sql = "UPDATE new_arch SET file_content = '$new_contenuto' WHERE file_name = '$nome_file'";
            $this->DB->query($sql);

           // header('Location: index.php' );

           echo "file aggiornato correttamente";

        } else  {echo "file non esiste";}

    }
    public function get($key){
            if ($this->exists($key)) {
                $sql= "SELECT file_content FROM $this->nome_archivio WHERE file_name='$key'";
                $cont = $this->DB->query($sql)->fetchAll(PDO::FETCH_COLUMN);
                return $cont[0];
            } else {echo "file non esiste";}
    }
    public  function lista(){

        return $this->DB->query_all($this->nome_archivio);

    }

    public function exists($nome_file)
    {
        $sql="SELECT * FROM $this->nome_archivio WHERE file_name='$nome_file'";
        $ok= $this->DB->query($sql)->fetchAll();
        var_dump($ok);

        if (count($ok)>0){
            return true;
        } else {
            return false;
        }

    }
}