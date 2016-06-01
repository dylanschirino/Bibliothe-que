<?php
/**
 * File: login.php
 * User: Dylan Schirino
 */
?>

<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">Connexion</h2>
        <form class="form__content" method="post" action="index.php">

            <label for="username" class="form__label">Nom d'utilisateur</label>
            <input class="form__input" type="text" name="username" value="" id="username" placeholder="Nom d'utilisateur">

            <label for="pass" class="form__label">Mot de passe</label>
            <input class="form__input" type="password" name="password" value="" id="pass" placeholder="password">
            <input type="submit" class="form__submit" value="Connexion">

            <div>
                <input type="hidden" name="a" value="postLogin">
                <input type="hidden" name="r" value="auth">
            </div>
        </form>
    </div>
