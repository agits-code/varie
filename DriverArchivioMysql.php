<?php
class DriverArchivioMysql implements DriverArchivio {

    Private $nome_archivio;
    Private $DB ;

    public function __construct ($nome_archivio)
    {
        $this->DB = new DB();
        // TODO controllare $nome_archivio;

        if ($nome_archivio) {
            $this->nome_archivio = $nome_archivio;
        } else { echo "nome archivio?";}

    }

    public  function insert($nome_file,$contenuto){

            if (!$this->exists($nome_file)) {
                 $sql = "INSERT INTO new_arch (file_name, file_content, nome_archivio)
                         VALUES ('$nome_file', '$contenuto', '$this->nome_archivio')";

                 $this->DB->query($sql);
                 $ok = "file inserito";

            } else {
                $ok = "file gìa esiste";
            }
            return $ok;

    }
    public function delete($nome_file){

           $sql = "DELETE FROM new_arch WHERE file_name ='$nome_file' AND nome_archivio='$this->nome_archivio'";
           $this->DB->query($sql);

    }
    public function update($nome_file,$new_contenuto){

        // TODO: nessun controllo di esista qui.
        // TODO: niente html.


            $sql = "UPDATE new_arch SET file_content = '$new_contenuto' WHERE file_name = '$nome_file' AND nome_archivio='$this->nome_archivio'";
            $this->DB->query($sql);
            return "file aggiornato correttamente";



    }
    public function get($key)
    {
        // TODO: qui non va fatto il controllo se esiste.

        $sql= "SELECT * FROM new_arch WHERE file_name='$key' AND nome_archivio='$this->nome_archivio'";
           $cont = $this->DB->query($sql)->fetchAll(PDO::FETCH_ASSOC);
          return $cont[0];


    }

    public  function lista()
    {

        // TODO: devi scrivere la qury QUI e passarla a query all.

        $sql = "SELECT file_name FROM new_arch WHERE nome_archivio = '$this->nome_archivio' ORDER BY timestamp DESC ";
        return $this->DB->query_all($sql);


    }

    public function exists($nome_file)
    {
        // TODO:
        // qui va scritta la query manualmente e passata a query_one.
        $sql= "SELECT * 
               FROM new_arch
               WHERE file_name='$nome_file' 
               AND nome_archivio='$this->nome_archivio'";

        $var= $this->DB->query($sql)->fetchAll();
        //var_dump($var);exit;
        if ($var){
            return true;

        } else {
            return false;

        }
    }
}