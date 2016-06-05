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
            <label for="name" class="form__label">Nom </label>
            <input class="form__input" type="text" name="name" value="" id="name" placeholder="Nom de famille">
            <label for="firstname" class="form__label">Prénom</label>
            <input class="form__input" type="text" name="firstname" value="" id="firstname" placeholder="Prénom">

            <label for="biographie" class="form__label">Biographie</label>
            <textarea class="form__input" type="text"  name="biographie" id="biographie" placeholder="Description">
                </textarea>
            <label for="photo" class="form__label">Lien image auteur</label>
            <input class="form__input" type="text" name="photo" value="" id="photo" placeholder="Photo de l'auteur">
            <label for="rating" class="form__label">Note de l'auteur</label>
            <input class="form__input" type="number" max="5" name="rating" value="" id="rating" placeholder="Note de l'auteur">
            <label for="editor" class="form__label">Editeur correspondant</label>

            <select id="editor" name="editorID">
                <?php foreach($data['editors'] as $editor):?>
                <option value="<?php echo $editor->id;?>"><?php echo $editor->society;?></option>
                <?php endforeach;?>
            </select>
            <input type="submit" class="form__submit" value="Ajouter">
            <div>
                <input type="hidden" name="a" value="postAuthor">
                <input type="hidden" name="r" value="author">
            </div>
        </form>
    </div>
</section>
