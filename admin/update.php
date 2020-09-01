<?php
require "../general.php";
$file = $_GET['file'];
$cont = $_GET['content'];
$ok=$archivio1->edit($file,$cont);
require "../views/update.view.php";

