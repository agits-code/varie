<?php

require "../general.php";
$file = $_GET['file'];

$cont=$archivio1->get($file);
//var_dump($cont);
require "../edit.view.php";