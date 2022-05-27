<?php
session_start();                                      // On démarre la session
session_destroy();                                    // On ferme la session du visiteur
?>
<script language="Javascript">
    document.location.replace("index");     <?php // Redirection vers la page d'accueil ?>
</script>
