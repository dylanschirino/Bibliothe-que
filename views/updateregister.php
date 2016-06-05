<?php
/**
 * File: updateregister.php
 * User: Dylan Schirino
 * Date: 5/06/16
 * Time: 16:05
 */;?>
<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Modifier un Editeur</h2>
    <?php $editor=$data['editors'];?>
        <form class="form__content" method="post" action="index.php">
            <label for="society" class="form__label">Nom de la société</label>
            <input class="form__input" type="text" name="society" value="<?php echo $editor->society;?>" id="society" placeholder="Nom de la société">

            <label for="descriptionEd" class="form__label">Description de la société</label>
            <textarea class="form__input" type="text" name="descriptionEd" id="descriptionEd" placeholder="Description">
                <?php echo $editor->description;?></textarea>
            <label for="picture" class="form__label">Lien image société</label>
            <input class="form__input" type="text" name="picture" value="<?php echo $editor->picture;?>" id="picture" placeholder="Image de la société">

            <input type="submit" class="form__submit" value="Modifer">
            <div>
                <input type="hidden" name="a" value="postEditor">
                <input type="hidden" name="r" value="editor">
            </div>
        </form>
    </div>
</section>