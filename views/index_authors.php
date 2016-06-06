<?php
/**
 * File: index_authors.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 14:59
 */; ?>
<main class="wrapper">
    <section class="underheader">
        <div class="mainimage">
            <h2 role="heading" aria-level="2" class="mainimage__title">Liste des auteurs</h2>
        </div>
    </section>
    <section class="filter">
        <div class="filter__content">
            <h3 role="heading" aria-level="3" class="filter__title">Filtrer par&nbsp;:</h3>
            <div class="filter__search">
                <form action="views/search.php" method="get">
                    <input type="text" class="filter__input" placeholder="Rechercher un Auteur" name="search">
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

    <section class="result">
        <a href="?a=getAuthorBook&r=book" class="livre__button livre__button--important">Lier un livre à un auteur</a>
        <h3 role="heading" aria-level="3" class="result__title">Résultat de la recherche : </h3>
        <?php foreach ($data['author'] as $authors): ?>
            <article class="result__livre">
                <h4 class="livre__title" role="heading" aria-level="4">
                    <?php echo $authors->firstname . '   ' . $authors->name; ?>
                </h4>
                <p class="livre__summary">
                    <span class="livre__bold">Résumé&nbsp;:&nbsp;</span>
                    <?php echo substr($authors->biographie, 0, 300) . ' ...'; ?>
                </p>
                <a class="livre__button" href="?a=show&r=author&id=<?php echo $authors->id;?>&with=books,editors">Vers la fiche de <?php echo $authors->name;?></a>
            </article>
        <?php endforeach; ?>
        <div>
            <?php if($data['page'] > 1): ?>
                <a href="?a=index&r=author&page=<?php echo ($data['page'] - 1); ?>">Page précédente</a>
            <?php endif; ?>
            <span><?php echo $data['page']; ?></span>
            <?php if($data['page'] <= 1): ?>
                <a href="?a=index&r=author&page=<?php echo ($data['page'] + 1); ?>">Page suivante</a>
            <?php endif; ?>
        </div>
    </section>
    </main>