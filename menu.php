<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
            <img src="images/deathstarw.png" width="40" height="40" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="index.php">
            <img src="images/starsflaw.png" width="93.255" height="40" alt="" loading="lazy">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Cours</a>
                    </li>  
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php
                    if(isset($_SESSION['nickname']))
                    //Si utilisateur connecté alors liens deconnexion, profil
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