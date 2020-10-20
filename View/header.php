<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav nav-item"><a href="index.php?action=listPosts" class="nav-link">Épisodes</a></li>
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
<header class="masthead">
    <div class="container h-100 d-flex flex-column align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Billet simple pour l'Alaska</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">Découvrez le nouveau roman de Jean Forteroche</h2>
        </div>
        <?php if (!empty($successMessage)) {
            ?>
            <div id="successMessage" class="col-8 alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $successMessage ?>
            </div>
        <?php }
        ?>
    </div>
</header>