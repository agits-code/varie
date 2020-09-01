<?php
require "../general.php";
$file = $_GET['file'];

$cont=$archivio1->get($file);

$ok = $archivio1->del($file);
require "../views/delete.view.php";