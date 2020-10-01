<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>
	<link href="../public/style.css.php" rel="stylesheet" type="text/css">

</head>

<body>



<h3> Modifica file : <?= $file;?></h3>




<form action="update.php">

	<input type="hidden" id="file" name="file" value=<?= $file;?>><br><br>
	<label for="content"><h3>nuovo contenuto file:</h3></label>


	<textarea cols="10" id="content" name="content" rows="5"><?= $cont['file_content'];?></textarea>

	<br><br>
    <input type="submit" value="Submit">
</form>


</body>
</html>

