<?php
/**
 * File: registerauthorbook.php
 * User: Dylan Schirino
 * Date: 6/06/16
 * Time: 10:46
 */;?>

<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Lier un auteur avec un livre</h2>

        <form class="form__content" method="post" action="index.php">
            <select id="auteur" name="auteurID">
                <?php foreach($data['authors'] as $author):?>
                    <option value="<?php echo $author->id;?>"><?php echo $author->name.' id : '.$author->id;?></option>
                <?php endforeach;?>
            </select>
            <select id="book" name="bookID">
                <?php foreach($data['books'] as $book):?>
                    <option value="<?php echo $book->id;?>"><?php echo $book->title.' id : '.$book->id;?></option>
                <?php endforeach;?>
            </select>
            <input type="submit" class="form__submit" value="Ajouter">
            <div>
                <input type="hidden" name="a" value="postAuthorBook">
                <input type="hidden" name="r" value="book">
            </div>
        </form>
    </div>
</section>