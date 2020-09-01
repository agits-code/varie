<?php


interface DriverArchivio
{
    public function insert ($nome_file, $contenuto);
    public function delete ($nome_file);
    public function update ($nome_file, $new_contenuto);
    public function get ($key);
    public function lista ();
}