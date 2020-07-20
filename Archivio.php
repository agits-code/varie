<?php


class Archivio
{
    protected $driver ;

    public function __construct($driver)
    {
        $this->driver = $driver;

    }


    public  function add($nome_file,$contenuto){

       return $this->driver->insert($nome_file,$contenuto);

    }
    public function del($nome_file){
        $this->driver->delete($nome_file);

    }
    public function edit($nome_file,$new_contenuto){
       return $this->driver->update($nome_file,$new_contenuto);

    }
    public function get($key){
       return $this->driver->get($key);

    }
    public  function lista(){

     return $this->driver->lista();

    }

}