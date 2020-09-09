<?php
?>
<nav class="navbar bg-light sticky-top">
    <ul class="nav">
        <li class="navbar-brand"><a href="index.php">Jean Forteroche</a></li>
        <li class="nav nav-item"><a class="nav-link">Nav Link</a></li>
        <li class="nav nav-item"><a href="index.php?action=admin" class="nav-link">Admin</a></li>
        <?php
        if (isset($_SESSION['memberName']))
        {?>
            <li class="nav nav-item nav-link">Bienvenue <?= $_SESSION['memberName'] ?></li>
            <li class="nav nav-item"><a href="index.php?action=logout" class="nav-link">Déconnexion</a></li>
        <?php }
         else {?>
        <li class="nav nav-item"><a href="index.php?action=register" class="nav-link">Inscription</a></li>
        <li class="nav nav-item"><a href="index.php?action=login" class="nav-link">Connexion</a></li>
        <?php } ?>
    </ul>
</nav>
<header class="jumbotron text-center">
    <h1>Jean FORTEROCHE</h1>
    <h2>Billet simple pour l'Alaska</h2>
    <!--<div><img src="../../public/images/hero.jpg" class="img-fluid" alt="paysage d'Alaska" /></div>-->
</header>
<!--Par ici, mettre une div qui peut recevoir des message Flash de session-->