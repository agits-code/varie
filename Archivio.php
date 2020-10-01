<?php


class Archivio
{
    protected $driver ;

    public function __construct(DriverArchivio $driver)
    {
        // TODO: controllare $driver--> nome classe!!!!
        $this->driver = $driver;
    }


    public  function add($nome_file,$contenuto)
    {
        // TODO: controllare che esista, o meglio che NON esista.
        if (!$this->exists($nome_file)) {
             $this->driver->insert($nome_file, $contenuto);
             return "file inserito correttamente";
        } else {
            return "file esiste già";
        }
    }
    public function del($nome_file)
    {
        // TODO controllare che ESISTA
        if ($this->exists($nome_file)) {
            $this->driver->delete($nome_file);
            return "file cancellato";
        } else {
            return "file non trovato";
        }
    }
    public function edit($nome_file,$new_contenuto)
    {
        // TODO controllare che esista
        if ($this->exists($nome_file)) {
            return $this->driver->update($nome_file, $new_contenuto);
        }
    }
    public function get ($key)
    {
        $file = $this->driver->get($key);

        if ($file) {

            return $file;
        }

        return false;
    }

    public  function lista ()
    {
        return $this->driver->lista();

    }
    public function exists ($file) {

        return $this->driver->exists($file);
    }

}
