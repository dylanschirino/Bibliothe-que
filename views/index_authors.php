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
    </section>
    <div class="pagination">
        <?php if($data['page'] > 1): ?>
            <a href="?a=index&r=author&page=<?php echo ($data['page'] - 1); ?>" class="pagination__controller">Page précédente</a>
        <?php endif; ?>
        <span class="pagination__number">Page&nbsp;:&nbsp;<?php echo $data['page']; ?></span>
        <?php if($data['page'] <= 1): ?>
            <a href="?a=index&r=author&page=<?php echo ($data['page'] + 1); ?>" class="pagination__controller">Page suivante</a>
        <?php endif; ?>
    </div>
    </main>
<footer>
    <div class="subfooter">
        <p class="subfooter__text">Design by Dylan Schirino &copy;</p>
    </div>
</footer>
