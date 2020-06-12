<?php
class ArchivioDocumenti {
     //private $percorso = "../MioArchivio/";
     public function __construct ($nome_archivio){
          $this->percorso = "../". $nome_archivio . "/";
    }
    public  function add($nome_file,$contenuto){
        $nome=$this->percorso.$nome_file;
        if (!file_exists($nome)) {
            file_put_contents($nome,$contenuto);
        } else {echo "file già esiste";}
    }
    public function del($nome_file){
        $nome = $this->percorso.$nome_file;
        if (! file_exists($nome)) {
            printf("Impossibile eliminare il file %s", $nome_file);
        } else {
            unlink($nome);
        }
    }
    public function edit($nome_file,$new_contenuto){
        $nome=$this->percorso.$nome_file;
        if (file_exists($nome)) {
            file_put_contents($nome,$new_contenuto);
        } else {echo "file non esiste";}
    }
    public function get($key){
        $nome=$this->percorso.$key;
        if (file_exists($nome)){
           return file_get_contents($nome);
        }
    }
    public  function lista(){
        $handler= opendir($this->percorso);
        if (false !== $handler ){
            while ($file = readdir($handler)) {
                if ($file !== "." && $file !=="..") {
                    $lista[] = $file;
                }
            }
        }
        closedir($handler);
        return $lista;
    }


}
$archivio= new ArchivioDocumenti("MioArchivio");
$archivio->edit("provaADD.pdf","vediamo se funge...modifica 2 file");
$archivio->add("prova-3Aa.pdf","vediamo se va bene v2a...");
echo "<pre>";
var_dump($archivio->lista());
echo "</pre>";
$archivio->del("prova-3A.pdf");
echo "<pre>";
var_dump($archivio->lista());
echo "</pre>";
echo $archivio->get("provaADD.pdf");

