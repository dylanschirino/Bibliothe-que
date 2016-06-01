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
                <?php foreach($data['authors'] as $authors) : ?>
                <li class="show__element show__element--auteur">
                    Auteur&nbsp;:&nbsp; <span class="element__span"><?php echo $data['authors']->name;?></span>
                </li>
                <?php endforeach;?>
                <?php foreach($data['books'] as $book) : ?>
                <li class="show__element show__element--book">
                    Livre&nbsp;:&nbsp; <span class="element__span"><?php echo $data['books']->title;?></span>
                </li>
                <?php endforeach;?>
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
                    <a href="#" class="show__link">Ajouter au favoris</a>
                </li>
                <li class="show__element">
                    <a href="#" class="show__link">Modifier</a>
                </li>
                <li class="show__element">
                    <a href="#" class="show__link">Supprimer</a>
                </li>
            </ul>
        </div>
        <article class="show__summary">
            <h5 class="summary__title">Résumé</h5>
            <p class="summary__text">Après la mort tragique de Lily et James Potter, Harry est recueilli par sa tante Pétunia, (la sœur de Lily) et son oncle Vernon à l'âge d'un an. Ces derniers, animés depuis toujours d'une haine féroce envers les parents du garçon qu'ils qualifient de gens «bizarres», voire de monstres»a 1, traitent froidement leur neveu et demeurent indifférents aux humiliations que leur fils Dudley lui fait subir. Harry ignore tout de l'histoire de ses parents, si ce n'est qu'ils ont été tués dans un accident de voiturea 2.
                Le jour de ses 11 ans, un demi-géant du nom de Rubeus Hagrid vient le chercher pour l’emmener à Poudlard, une école de sorcellerie, où il est inscrit depuis sa naissance et attendu pour la prochaine rentrée. Hagrid lui révèle alors qu’il a toujours été un sorcier, tout comme l'étaient ses parents, tués en réalité par le plus puissant mage noir du monde de la sorcellerie, Voldemort (surnommé "Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom"), après qu'ils ont refusé de se joindre à luia 3.

                Ce serait Harry lui-même, alors qu'il n'était encore qu'un bébé, qui aurait fait ricocher le sortilège que Voldemort lui destinait, neutralisant ses pouvoirs et le réduisant à l'état de créature quasi-insignifiantea 4. Le fait d'avoir vécu son enfance chez son oncle et sa tante dépourvus de pouvoirs magiques lui a donc permis de grandir à l'abri de sa notoriété dans le monde des sorciers.


                Harry entre donc à l’école de Poudlard, dirigée par le professeur Albus Dumbledore. Il est envoyé dans la maison Gryffondor par le choixpeau magique. Il y fait la connaissance de Ron Weasley et Hermione Granger, qui deviendront ses complices. Par ailleurs, Harry intègre rapidement l'équipe de Quidditch de sa maison, un sport collectif très populaire chez les sorciers se pratiquant sur des balais volants. Harry connaît probablement la plus heureuse année de sa vie, mais également la plus périlleuse, car Voldemort n'a pas totalement disparu et semble bien décidé à reprendre forme humaine.</p>
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

