<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>


</head>

<body>



<h3> Elimina file : <?= $file;?></h3>

<h3> Contenuto :  </h3>

<div><?= $cont;?></div>


<form action="delete.php">

    <input type="hidden" id="file" name="file" value=<?= $file;?>><br><br>

    <input type="submit" value="delete">
</form>

</body>
</html>
