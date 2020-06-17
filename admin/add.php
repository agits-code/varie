<?php
require "../general.php";
$file = $_GET['file'];
$cont = $_GET['content'];
$archivio1->add($file,$cont);
