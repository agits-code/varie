<?php
require "ArchivioDocumenti.php";
$file = $_GET['file'];
$arch = new ArchivioDocumenti("MioArchivio");
$cont= $arch->get($file);
require "document-view.php";




