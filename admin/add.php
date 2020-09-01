<?php
require "../general.php";
$file = $_GET['file'];
$cont = $_GET['content'];
//var_dump($cont);
$ok = $archivio1->add($file,$cont);
require "../views/add.view.php";
