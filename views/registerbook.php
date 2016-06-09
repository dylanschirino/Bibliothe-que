<?php
/**
 * File: registerbook.php
 * User: Dylan Schirino
 * Date: 5/06/16
 * Time: 21:43
 */;?>

<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Ajouter un Livre</h2>

        <form class="form__content" method="post" action="index.php">
            <label for="title" class="form__label">Titre du livre </label>
            <input class="form__input" type="text" name="title" value="" id="title" placeholder="Titre du livre">
            <label for="num_page" class="form__label">Nombre de pages</label>
            <input class="form__input" type="number" name="num_page" value="" id="num_page" placeholder="Nombre de pages">

            <label for="cover" class="form__label">Lien image livre</label>
            <input class="form__input" type="text" name="cover" value="" id="cover" placeholder="Photo du livre">
            <label for="rating" class="form__label">Note du livre</label>
            <input class="form__input" type="number" max="5" name="rating" value="" id="rating" placeholder="Note de l'auteur">

            <label for="editor" class="form__label">Editeur correspondant</label>
            <select id="editor" name="editorID">
                <?php foreach($data['editors'] as $editor):?>
                    <option value="<?php echo $editor->id;?>"><?php echo $editor->society;?></option>
                <?php endforeach;?>
            </select>
            <label for="summary" class="form__label">Résumé</label>
            <textarea class="form__input form__input--textarea" type="text"  name="summary" id="summary" placeholder="Résumé">
                </textarea>
            <input type="submit" class="form__submit" value="Ajouter">
            <div>
                <input type="hidden" name="a" value="postBook">
                <input type="hidden" name="r" value="book">
            </div>
        </form>
    </div>
</section>
