<?php
require "ArchivioDocumenti.php";

$archivio1 = new ArchivioDocumenti("MioArchivio");
$archivio2 = new ArchivioDocumenti("provaArchivio2");


$lista1=$archivio1->lista();

require "lista.php";
