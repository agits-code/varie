<?php

require "DB.php";
require "DriverArchivio.php";
require "Archivio.php";
require "DriverArchivioFile.php";
require "DriverArchivioMysql.php";

$driver = new DriverArchivioMysql("agits");//mysql
//$driver = new DriverArchivioFile("agits");//file
$archivio1 = new Archivio($driver);
