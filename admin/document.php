<?php
require "../general.php";
$file = $_GET['file'];

$cont=$archivio1->get($file);
require "../document.view.php";




