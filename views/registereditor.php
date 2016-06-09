<?php
/**
 * File: registereditor.php
 * User: Dylan Schirino
 * Date: 5/06/16
 * Time: 12:29
 */;?>

<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Ajouter un Editeur</h2>

        <form class="form__content" method="post" action="index.php">
            <label for="society" class="form__label">Nom de la société</label>
            <input class="form__input" type="text" name="society" value="" id="society" placeholder="Nom de la société">

            <label for="picture" class="form__label">Lien image société</label>
            <input class="form__input" type="text" name="picture" value="" id="picture" placeholder="Image de la société">

            <label for="descriptionEd" class="form__label">Description de la société</label>
            <textarea class="form__input form__input--textarea" type="text" name="descriptionEd" id="descriptionEd" placeholder="Description">
                </textarea>
            <input type="submit" class="form__submit" value="s'inscrire">
            <div>
                <input type="hidden" name="a" value="postEditor">
                <input type="hidden" name="r" value="editor">
            </div>
        </form>
    </div>
</section>