<?php
require "DriverArchivio.php";
require "Archivio.php";
require "DriverArchivioFile.php";
require "DriverArchivioMysql.php";


$archivio1 = new Archivio("new_arch");//mysql
//$archivio1 = new Archivio("MioArchivio");//file