<nav class="navbar navbar-expand-lg navbar-light bg-lights">
    <a class="navbar-brand" href="index.php">
        <img src="images/deathstarw.png" width="40" height="40" alt="" loading="lazy">
    </a>
    <a class="navbar-brand" href="index.php">
        <img src="images/starsflaw.png" width="93.255" height="40" alt="" loading="lazy">
    </a>

    <?php // Rendre le menu responsive ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php // Utilisateur connecté ou non => liens Cours et À propos ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="courses.php">Cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">À propos</a>
            </li>  
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            // Si utilisateur connecté => liens Se déconnecter et Profil
            if(isset($_SESSION['nickname']))
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Se déconnecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <?php
            }
            // Si utilisateur non-connecté => liens S'inscrire et Se connecter
            else
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Se connecter</a>
                </li>
                <?php
            }
            ?>  
        </ul>
    </div>
</nav>