<?php
/*
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    echo '<nav class="navbar bg-dark text-light sticky-top">';
} else {
    echo '<nav class="navbar bg-light sticky-top">';
}
?>
    <ul class="nav">
        <li class="navbar-brand"><a href="index.php">Jean Forteroche</a></li>
        <?php
        if (isset($_SESSION['memberName']))
        {?>
            <li class="nav nav-item nav-link">Bienvenue <?= $_SESSION['memberName'] ?></li>
            <?php
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                echo '<li class="nav nav-item"><a href="index.php?action=admin" class="nav-link">' . 'Panneau d\'administration' . '</a></li>';
                }
            ?>
            <li class="nav nav-item"><a href="index.php?action=logout" class="nav-link">Déconnexion</a></li>
        <?php }
         else {?>
        <li class="nav nav-item"><a href="index.php?action=register" class="nav-link">Inscription</a></li>
        <li class="nav nav-item"><a href="index.php?action=login" class="nav-link">Connexion</a></li>
        <?php } ?>
    </ul>
</nav>
*/?>
<!--Test du thème-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Contact</a></li>
                <?php
                if (isset($_SESSION['memberName']))
                {?>
                    <li class="nav nav-item nav-link">Bienvenue <?= $_SESSION['memberName'] ?></li>
                    <?php
                    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                        echo '<li class="nav nav-item"><a href="index.php?action=admin" class="nav-link">' . 'Panneau d\'administration' . '</a></li>';
                    }
                    ?>
                    <li class="nav nav-item"><a href="index.php?action=logout" class="nav-link">Déconnexion</a></li>
                <?php }
                else {?>
                    <li class="nav nav-item"><a href="index.php?action=register" class="nav-link">Inscription</a></li>
                    <li class="nav nav-item"><a href="index.php?action=login" class="nav-link">Connexion</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<header class="jumbotron text-center">
    <h1>Jean FORTEROCHE</h1>
    <h2>Billet simple pour l'Alaska</h2>
    <!--<div><img src="../../public/images/hero.jpg" class="img-fluid" alt="paysage d'Alaska" /></div>-->
</header>
<!--Par ici, mettre une div qui peut recevoir des message Flash de session-->