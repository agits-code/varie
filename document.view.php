
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>
    <link rel="stylesheet" type="text/css" href="../style.css.php">
</head>

<body>
<h3> File : <?=$file;?> </h3>
<?php
$link2="edit.php?file=".$file;
$link3="delete.php?file=".$file;
?>
<a href="<?= $link2;?>" > edit</a>
<a href="<?= $link3;?>" > delete</a>

<h3> Contenuto :  </h3>

<div><?= $cont;?></div>

</body>
</html>