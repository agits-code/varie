<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>


</head>

<body>


<h1>modifica</h1>
<h3> File : <?=$file;?> </h3>
<h3> Contenuto :  </h3>

<div><?= $cont;?></div>


<form action="update.php">

    <!--<input type="text" id="file" name="fname"><br><br>  -->
    <label for="file">nome file:</label>

    <input type="text" id="file" name="fname" value=<?= $file;?>><br><br>
    <label for="content">nuovo contenuto file:</label>
    <textarea cols="33" id="content"
              name="content" rows="5">
<?= $cont;?>
</textarea><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

