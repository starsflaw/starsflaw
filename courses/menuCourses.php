<?php include "../lang_config.php" ?>
<nav class="navbar navbar-expand-lg navbar-light bg-lights">
    <a class="navbar-brand" href="../index">
        <img src="../images/deathstarw.png" width="40" height="40" alt="" loading="lazy">
    </a>
    <a class="navbar-brand" href="../index">
        <img src="../images/starsflaw.png" width="93.255" height="40" alt="" loading="lazy">
    </a>

    <?php // Rendre le menu responsive ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <script language="javascript" type="text/javascript">
        var url = location.pathname;
        var scrt_var = url.substring(13);
    </script>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php // Utilisateur connecté ou non => liens Cours et À propos ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../course">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about">About us</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="<?=$_SERVER['PHP_SELF']?>?lang=fr" onclick="location.href=this.href;"><img src="../images/french1.png" alt="french flag"></a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="<?=$_SERVER['PHP_SELF']?>?lang=en" onclick="location.href=this.href;"><img src="../images/english1.png" alt="english flag"></a>
            </li> 
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            // Si utilisateur connecté => liens Se déconnecter et Profil
            if(isset($_SESSION['nickname']))
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../logout">Disconnected</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profil">Profile</a>
                </li>
                <?php
            }
            // Si utilisateur non-connecté => liens S'inscrire et Se connecter
            else
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../register">Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login">Log in</a>
                </li>
                <?php
            }
            ?>  
        </ul>
    </div>
</nav>