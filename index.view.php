<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>

</head>

<body>


<h1>mio archivio1</h1>
<h4><a href="../aggiungi.php" target="_blank"> aggiungi file </a></h4>
<h3>lista documenti</h3>

<ul>
    <?php foreach ($lista1 as $item) : ?>
        <?php $link1="document.php?file=".$item;
              //$link2="../edit.php?file=".$item;
        $link2="edit.php?file=".$item;
        $link3="del.php?file=".$item;

        ?>
        <li><a href="<?= $link1;?>"  ><?= $item; ?></a>
	        <a href="<?= $link2;?>" > Edit</a>
	        <a href="<?= $link3;?>" > Delete</a>
        </li>

    <?php endforeach;?>
</ul>

</body>
</html>
