<?php
/**
 * File: show_authors.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 20:25
 */;?>
<main class="wrapper">

    <section class="underheader">

        <div class="mainimage">
            <h2 role="heading" aria-level="2" class="mainimage__title">Fiche de l'auteur</h2>

        </div>

    </section>

    <section class="show">
        <h3 class="show__title" role="heading" aria-level="3"><?php echo $data['authors']->name.' '.$data['authors']->firstname ;?></h3>
        <div class="show__content">
            <div class="show__images">
                <img src="<?php echo $data['authors']->photo ;?>" width="300" height="477" alt="Image du livre" class="show__image">
            </div>
            <ul class="show__menu">
                <li class="show__element show__element--auteur">
                    Prénom&nbsp;:&nbsp; <span class="element__span"><?php echo $data['authors']->firstname;?></span>
                </li>
                <li class="show__element show__element--name">
                    Nom&nbsp;:&nbsp; <span class="element__span"><?php echo $data['authors']->name;?></span>
                </li>
                <?php if($data['editors']): ?>
                <?php foreach($data['editors'] as $editors) : ?>
                <li class="show__element show__element--editeur">
                    Editeur&nbsp;:&nbsp; <span class="element__span"><?php echo $editors->society;?></span>
                </li>
                <?php endforeach;?>
                <?php endif;?>
                <?php if($data['books']): ?>
                <li class="show__element show__element--book">
                    Livre&nbsp;:&nbsp;
                    <?php foreach($data['books'] as $books) : ?>
                    <span class="element__span"><?php echo $books->title.' ,';?>
                    </span>
                    <?php endforeach;?>
                </li>
                <?php endif;?>
                <li class="show__element show__element--rank">
                    Notes&nbsp;:&nbsp;<div class="show__rating">
                        <?php for($i=0;$i<$data['authors']->aut_rating;$i++) :?>
                        <a href="#" title="Donner 5 étoiles" class="show__rating--link"></a>
                        <?php endfor;?>
                    </div>
                </li>
                <li class="show__element">
                    <a href="?a=getAuthor&r=author&id=<?php echo $data['authors']->id;?>&with=books,editors" class="show__link">Ajouter un auteur</a>
                </li>
                <li class="show__element">
                    <a href="?a=updateAuthor&r=author&id=<?php echo $data['authors']->id;?>" class="show__link">Modifier</a>
                </li>
                <li class="show__element">
                    <a href="?a=deleteAuthor&r=author&id=<?php echo $data['authors']->id;?>" class="show__link">Supprimer</a>
                </li>
            </ul>
        </div>
        <article class="show__summary">
            <h5 class="summary__title">Résumé</h5>
            <p class="summary__text">
                <?php echo $data['authors']->biographie;?>
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
