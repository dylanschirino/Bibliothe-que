<?php
/**
 * File: index_editors.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:37
 */
;?>
<main class="wrapper">

    <section class="underheader">

      <div class="mainimage">
        <h2 role="heading" aria-level="2" class="mainimage__title">Liste des éditeurs</h2>

      </div>

    </section>

      <section class="result">
        <h3 role="heading" aria-level="3" class="result__title">Résultat de la recherche : </h3>
          <?php foreach ($data['editor'] as $editors): ?>
        <article class="result__livre">
          <h4 class="livre__title" role="heading" aria-level="4">
            <?php echo $editors->society;?>
          </h4>
          <p class="livre__summary">
            <span class="livre__bold">Description&nbsp;:&nbsp;</span>
            <?php echo substr($editors->description, 0, 300) . ' ...'; ?>
          </p>
        <a class="livre__button"  href="?a=show&r=editor&id=<?php echo $editors->id;?>&with=books,authors">Vers la fiche de <?php echo $editors->society;?></a>
        </article>
        <?php endforeach;?>
      </section>
    <div class="pagination">
        <?php if($data['page'] > 1): ?>
            <a href="?a=index&r=editor&page=<?php echo ($data['page'] - 1); ?>" class="pagination__controller">Page précédente</a>
        <?php endif; ?>
        <span class="pagination__number">Page&nbsp;:&nbsp;<?php echo $data['page']; ?></span>
        <?php if($data['page'] < 1): ?>
            <a href="?a=index&r=editor&page=<?php echo ($data['page'] + 1); ?>" class="pagination__controller">Page suivante</a>
        <?php endif; ?>
    </div>

</main>
<footer>
    <div class="subfooter">
        <p class="subfooter__text">Design by Dylan Schirino &copy;</p>
    </div>
</footer>
</body>
</html>

