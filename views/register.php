<section class="form">
    <div class="form__container">
        <h2 class="form__title" aria-level="2" role="heading">S'inscrire</h2>

        <form class="form__content" method="post" action="index.php">
            <?php if(isset($_SESSION['errors']['mail'])): ?>
                <div>
                    <p>
                        <?php echo $_SESSION['errors']['mail'];?>
                    </p>
                </div>
            <?php endif;?>
            <?php if(isset($_SESSION['errors']['password'])): ?>
                <div>
                    <p>
                        <?php echo $_SESSION['errors']['password'];?>
                    </p>
                </div>
            <?php endif;?>
            <label for="username" class="form__label">Nom d'utilisateur</label>
            <input class="form__input" type="text" name="username" value="" id="username" placeholder="Nom d'utilisateur">

            <label for="mail" class="form__label">Adresse email</label>
            <input class="form__input" type="email" name="mail" value="" id="email" placeholder="email@adresse.be">

            <label for="pass" class="form__label">Mot de passe</label>
            <input class="form__input" type="password" name="password" value="<?php echo isset($_SESSION['old-datas']['email'])?$_SESSION['old-datas']['email']:'';?>" id="pass" placeholder="password">

            <input type="submit" class="form__submit" value="s'inscrire">
            <div>
                <input type="hidden" name="a" value="postRegister">
                <input type="hidden" name="r" value="auth">
            </div>
        </form>
    </div>
</section>
