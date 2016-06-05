<?php
/**
 * File: registerauthor.php
 * User: Dylan Schirino
 * Date: 5/06/16
 * Time: 19:47
 */;?>
<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Ajouter un Auteur</h2>

        <form class="form__content" method="post" action="index.php">
            <label for="name" class="form__label">Nom de famille</label>
            <input class="form__input" type="text" name="name" value="" id="name" placeholder="Nom de la société">

            <label for="descriptionEd" class="form__label">Description de la société</label>
            <textarea class="form__input" type="text" name="descriptionEd" id="descriptionEd" placeholder="Description">
                </textarea>
            <label for="picture" class="form__label">Lien image société</label>
            <input class="form__input" type="text" name="picture" value="" id="picture" placeholder="Image de la société">

            <input type="submit" class="form__submit" value="s'inscrire">
            <div>
                <input type="hidden" name="a" value="postAuthor">
                <input type="hidden" name="r" value="editor">
            </div>
        </form>
    </div>
</section>
