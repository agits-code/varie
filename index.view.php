<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documenti Archivio</title>

</head>

<body>


<h1>mio archivio1</h1>
<h4><a href="../aggiungi.php" > aggiungi file </a></h4>
<h3>lista documenti</h3>

<ul>
    <?php foreach ($lista1 as $item) : ?>
        <?php $link1="document.php?file=".$item;



        ?>
        <li><a href="<?= $link1;?>" > <?= $item; ?></a>

        </li>

    <?php endforeach;?>
</ul>

</body>
</html>
