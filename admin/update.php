<?php
require "../general.php";
$file = $_GET['fname'];
$contenuto = $_GET['content'];
$archivio1->edit($file,$contenuto);

