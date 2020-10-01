<?php
class DriverArchivioFile implements DriverArchivio {

    private string $percorso = "";


    public function __construct ($nome_archivio)
    {
        $this->percorso = "../MioArchivio/". $nome_archivio . "/";
    }


    public  function insert ($nome_file, $contenuto)
    {
        $nome="../" . $this->percorso . $nome_file;

        if (!$this->exists($nome)) {
            file_put_contents($nome,$contenuto);
        } else {
            echo "file già esiste";
        }
    }


    public function delete ($nome_file)
    {
        $nome = "../" . $this->percorso . $nome_file;

        if (!$this->exists($nome)) {
            printf("Impossibile eliminare il file %s", $nome_file);
        } else {
            unlink($nome);
        }
    }


    public function update ($nome_file, $new_contenuto)
    {
        $nome="../" . $this->percorso . $nome_file;

        if ($this->exists($nome)) {
            file_put_contents($nome,$new_contenuto);
            return "file aggirnato";
        } else {
            return "file non esiste";
        }
    }
    public function get ($key)
    {

        $nome = "../" . $this->percorso . $key;

        if ($this->exists($key)) {
            $file['file_name'] = $key;
            $file['file_content'] = file_get_contents($nome);
            $file['timestamp'] = date("d.m.Y, H:i",filemtime($nome));
            return $file;
        }
    }


    public function lista()
    {
        $handler = opendir("../" . $this->percorso);

        if (false !== $handler)
        {
            while ($file = readdir($handler))
            {
                if ($file !== "." && $file !=="..") {
                    $i = filemtime("../" . $this->percorso . $file);
                    $lista[$i] = $file;
                }
            }
        }

        krsort($lista);
        closedir($handler);

        return $lista;
    }


    public function exists ($nome_file)
    {
        $nome = "../" . $this->percorso . $nome_file;

        if (file_exists($nome)) {
            return true;
        } else {
            return false;
        }
    }
}
