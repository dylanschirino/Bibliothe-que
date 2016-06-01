<?php
/**
 * File: index_books.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 15:47
 */;?>
<section class="result">
        <h3 role="heading" aria-level="3" class="result__title">Résultat de la recherche : </h3>
    <?php foreach ($data['book'] as $book) : ?>
        <article class="result__livre">
          <h4 class="livre__title" role="heading" aria-level="4">Titre du livre</h4>
          <p class="livre__summary">
            <span class="livre__bold">Résumé&nbsp;:&nbsp;</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
</p>
        <a class="livre__button"  href="showbooks.html">Vers la fiche du livre</a>
        </article>
    <?php endforeach;?>

        </article>
      </section>