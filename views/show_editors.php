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
    <section class="filter">
        <div class="filter__content">
            <h3 role="heading" aria-level="3" class="filter__title">Filtrer par&nbsp;:</h3>
            <div class="filter__search">
                <form action="#" method="get">
                    <input type="search" class="filter__input" placeholder="Rechercher un livre" name="the_search">
                    <input type="submit" value="Envoyer" class="filter__submit">
                </form>
            </div>
            <ul class="filter__menu">
                <li class="menu__title">
                    <span class="menu__text">Date</span>
                    <ul>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Plus récent</a>
                        </li>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Plus ancien</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__title">
                    <span class="menu__text">Genre</span>
                    <ul>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Action</a>
                        </li>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Drame</a>
                        </li>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Aventure</a>
                        </li>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Policier</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__title">
                    <span class="menu__text">Top</span>
                    <ul>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Les plus cotés</a>
                        </li>
                        <li class="menu__subelement">
                            <a href="#" class="filter__link">Les plus detesté</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>

    <section class="show">
        <h3 class="show__title" role="heading" aria-level="3"><?php echo $data['editors']->society;?></h3>
        <div class="show__content">
            <div class="show__images">
                <img src="../img/livre.jpg" width="300" height="477" alt="Image du livre" class="show__image">
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

                <li class="show__element show__element--rank">
                    Notes&nbsp;:&nbsp;<div class="show__rating">
                        <a href="#5" title="Donner 5 étoiles" class="show__rating--link"></a><!--
            --><a href="#4" title="Donner 4 étoiles" class="show__rating--link"></a><!--
          --><a href="#3" title="Donner 3 étoiles" class="show__rating--link"></a><!--
        --><a href="#2" title="Donner 2 étoiles" class="show__rating--link"></a><!--
      --><a href="#1" title="Donner 1 étoile" class="show__rating--link"></a>
                    </div>
                </li>
                <li class="show__element">
                    <a href="?a=getEditor&r=editor" class="show__link">Ajouter un éditeur</a>
                </li>
                <li class="show__element">
                    <a href="#" class="show__link">Modifier</a>
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

