<main class="wrapper">

    <section class="underheader">

        <div class="mainimage">
            <h2 role="heading" aria-level="2" class="mainimage__title">La première bibliothèque interactive</h2>

            <p class="mainimage__text">Ici vous pouvez consulté des livres, des auteurs ainsi que des éditeurs selon vos besoin.
                Vous pouvez également les modifiés à votre guise, les ajoutés à vos favoris et supprimé un livre sous réserve d'acceptation
            </p>

        </div>

    </section>
    <section class="topbooks">
        <h3 role="heading" aria-level="3" class="topbooks__title">Livres à la une</h3>
        <?php $i = 0;
        // On prend l'ordre inverse du tableau et on fait un break quand on 2 element.
        foreach(array_reverse($data['books']) as $books):?>
            <?php if(++$i > 2) break;?>
        <article class="books">
            <h4 class="books__title" role="heading" aria-level="4"><?php echo $books->title;?></h4>
            <img src="<?php echo $books->cover;?>" alt="Image du livre" width="200" height="300" class="books__image">
            <p class="books__summary">
                Résumé&nbsp;:&nbsp;<?php echo substr($books->summary, 0, 300) . ' ...';?>
            </p>
            <a class="books__button"  href="?a=show&r=book&id=<?php echo $books->id;?>&with=authors,editors">Voir la fiche de <?php echo $books->title;?></a>
        </article>
        <?php endforeach;?>


    </section>

    <section class="topauthors">
        <?php $author = end($data['author']) ;?>
        <h3 role="heading" aria-level="3" class="topauthors__title">Dernier auteur ajouté</h3>
        <img src="<?php echo $author->photo;?>" alt="Image de l'auteur" class="topauthors__image">
        <a class="topauthors__button"  href="?a=show&r=author&id=<?php echo $author->id;?>&with=books,editors">lire la fiche de <?php echo $author->firstname.' '.$author->name;?></a>
    </section>

</main>