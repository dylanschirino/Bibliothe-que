<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="biblio,authors,editors,books,library">
    <meta name="author" content="Dylan Schirino">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title><?php echo $data['ressource_title'];?></title>
</head>
<body>
<?php include('header.php');?>
<?php include($data['view']); ?>
<footer>
    <div class="subfooter">
        <p class="subfooter__text">Design by Dylan Schirino &copy;</p>
    </div>
</footer>
</body>
</html>

