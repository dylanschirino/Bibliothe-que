<?php
/**
 * File: header.php
 * User: Dylan Schirino
 */
;?>
<header class="header">

      <div class="header__topbar">
        <h1 aria-level="1" role="heading" class="topbar__title"><a href="index.html" class="topbar__title--link">Bibliotech</a></h1>
        <nav class="topbar__menu">
          <h2 role="heading" aria-level="2"> Main Navigation</h2>
          <ul>
            <li class="menu__element">
              <a href="index.php" class="menu__link menu__link--active">Accueil</a>
            </li>
            <li class="menu__element">
              <a href="html/livres.html" class="menu__link">Livres</a>
            </li>
            <li class="menu__element">
              <a href="html/auteurs.html" class="menu__link">Auteurs</a>
            </li>
            <li class="menu__element">
              <a href="html/editeurs.html" class="menu__link">Editeurs</a>
            </li>
            <li class="menu__element">
              <a href="html/contact.html" class="menu__link">À propos</a>
            </li>
            <?php if (!isset($_SESSION['user'])): ?>
            <li class="menu__element menu__element--register">
                <a href="?a=getRegister&r=auth" class="menu__link menu__link--register">S'inscrire</a>
            </li>
            <li class="menu__element menu__element--connexion">
                <a href="?a=getLogin&r=auth" class="menu__link menu__link--register">Connexion</a>
            </li>
                <?php else: ?>
                <?php $user = json_decode($_SESSION['user']); ?>

                <li class="menu__element menu__element--connexion">
                    <a href="?a=getLogout&r=auth" class="menu__link menu__link--register"><?php echo $user->username;?><br>Deconnexion</a>
                </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>

    </header>