<?php

require "DB.php";
require "DriverArchivio.php";
require "Archivio.php";
require "DriverArchivioFile.php";
require "DriverArchivioMysql.php";

$driver = new DriverArchivioMysql("new_arch");//mysql
//$driver = new DriverArchivioFile("MioArchivio");//file
$archivio1 = new Archivio($driver);//mysql
