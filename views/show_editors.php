<?php
/**
 * File: show_editors.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:47
 */;?>
<main class="wrapper">

    <section class="underheader">
        <div class="mainimage">
            <h2 role="heading" aria-level="2" class="mainimage__title">Fiche de l'éditeur</h2>
        </div>
    </section>


    <section class="show">
        <h3 class="show__title" role="heading" aria-level="3"><?php echo $data['editors']->society;?></h3>
        <div class="show__content">
            <div class="show__images">
                <img src="<?php echo $data['editors']->picture;?>" width="300" height="477" alt="Image du livre" class="show__image">
            </div>
            <ul class="show__menu">
                <li class="show__element show__element--editeur">
                    Société&nbsp;:&nbsp; <span class="element__span"><?php echo $data['editors']->society;?></span>
                </li>
                <li class="show__element show__element--auteur">
                    Auteur&nbsp;:&nbsp;
                    <?php foreach($data['authors'] as $authors) : ?>
                    <span class="element__span">
                        <?php echo $authors->name.', ';?>
                    </span>
                    <?php endforeach;?>
                </li>

                <li class="show__element show__element--book">
                    Livre&nbsp;:&nbsp;
                    <?php foreach($data['books'] as $book) : ?>
                    <span class="element__span">
                        <?php echo $book->title.', ';?>
                    </span>
                    <?php endforeach;?>
                </li>
                <li class="show__element">
                    <a href="?a=getEditor&r=editor" class="show__link">Ajouter un éditeur</a>
                </li>
                <li class="show__element">
                    <a href="?a=updateEditor&r=editor&id=<?php echo $data['editors']->id;?>" class="show__link">Modifier</a>
                </li>
                <li class="show__element">
                    <a href="?a=deleteEditor&r=editor&id=<?php echo $data['editors']->id;?>" class="show__link">Supprimer</a>
                </li>
            </ul>
        </div>
        <article class="show__summary">
            <h5 class="summary__title">Résumé</h5>
            <p class="summary__text">
                <?php echo $data['editors']->description;?>
            </p>
            </article>
    </section>
</main>
<footer>
    <div class="subfooter">
        <p class="subfooter__text">Design by Dylan Schirino &copy;</p>
    </div>
</footer>
</body>
</html>

