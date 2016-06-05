<?php
/**
 * File: show_books.php
 * User: Dylan Schirino
 * Date: 1/06/16
 * Time: 21:28
 */;?>
<main class="wrapper">

    <section class="underheader">

      <div class="mainimage">
        <h2 role="heading" aria-level="2" class="mainimage__title">Fiche du livre</h2>

      </div>

    </section>

    <section class="show">
      <h3 class="show__title" role="heading" aria-level="3"><?php echo $data['books']->title;?></h3>
      <div class="show__content">
        <div class="show__images">
          <img src="../img/livre.jpg" width="300" height="477" alt="Image du livre" class="show__image">
        </div>
        <ul class="show__menu">
          <li class="show__element show__element--auteur">
              Auteurs&nbsp;:&nbsp;
              <?php foreach($data['authors'] as $authors) : ?>
              <span class="element__span">
                  <?php echo $authors->name.', ';?>
              </span>
              <?php endforeach;?>
          </li>
          <li class="show__element show__element--editeur">
            Editeurs&nbsp;:&nbsp;
              <?php foreach($data['editors'] as $editors) : ?>
              <span class="element__span">
                  <?php echo $editors->society.', ';?>
              </span>
              <?php endforeach;?>
          </li>
          <li class="show__element show__element--page">
Pages&nbsp;:&nbsp; <span class="element__span"><?php echo $data['books']->num_page;?></span>
          </li>
          <li class="show__element show__element--rank">
Notes&nbsp;:&nbsp;<div class="show__rating">
                  <?php for($i=0;$i<$data['books']->rating;$i++) :?>
              <a href="#5" title="Donner 5 étoiles" class="show__rating--link"></a>
                  <?php endfor;?>

  </div>
</li>
<li class="show__element">
  <a href="?a=getBook&r=book&id=<?php echo $data['books']->id;?>&with=authors,editors" class="show__link">Ajouter un livre</a>
</li>
<li class="show__element">
  <a href="#" class="show__link">Modifier</a>
</li>
<li class="show__element">
  <a href="?a=deleteBook&r=book&id=<?php echo $data['books']->id;?>" class="show__link">Supprimer</a>
</li>
</ul>
</div>
<article class="show__summary">
  <h5 class="summary__title">Résumé</h5>
  <p class="summary__text"><?php echo  $data['books']->summary;?></p>
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