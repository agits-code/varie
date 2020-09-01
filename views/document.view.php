
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css.php">
</head>

<body>
<h3> File : <?=$file;?> </h3>
<h5> Ultima Modifica : <?=  $cont['timestamp']?></h5>
<?php
$link2="edit.php?file=".$file;
$link3="delete.php?file=".$file;
$link4="../admin/index.php";
?>
<a href="<?= $link2;?>" > edit</a>
<a href="<?= $link3;?>" > delete</a>
<a href="<?= $link4;?>" > list</a>
<h3> Contenuto :  </h3>
<?php if ($cont){?>

<div><?= $cont['file_content'];?></div>
<?php }?>

</body>
</html>