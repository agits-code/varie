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
                 header('Location: index.php' );
             } else {echo "file gìa esiste";}

    }
    public function delete($nome_file){
        if ($this->exists($nome_file)) {
            $sql = "DELETE FROM $this->nome_archivio WHERE file_name ='$nome_file'";
            $this->DB->query($sql);
            header('Location: index.php' );
        } else {echo "file non esiste"  ;}
    }
    public function update($nome_file,$new_contenuto){
        if ($this->exists($nome_file))
        {
            $sql = "UPDATE new_arch SET file_content = '$new_contenuto' WHERE file_name = '$nome_file'";
            $this->DB->query($sql);
            header('Location: index.php' );
        } else  {echo "file non esiste";}

    }
    public function get($key)
    {
        if ($val=$this->DB->query_one($key,$this->nome_archivio)) {
                return $val['file_content'];
        } else {echo "file non esiste";}
    }

    public  function lista()
    {
        return $this->DB->query_all($this->nome_archivio);
    }

    public function exists($nome_file)
    {
        if ($this->DB->query_one($nome_file,$this->nome_archivio)){
            return true;
        } else {
            return false;
        }
    }
}