<?php
require "../general.php";
$file = $_GET['file'];
$cont = $_GET['content'];
//var_dump($cont);
$archivio1->add($file,$cont);
