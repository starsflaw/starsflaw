<?php

    $menu = array(
        "home" => "Accueil",
        "courses" => "Cours",
    );

    //Can be used for all challenges
    $challenge = array(
        "download" => "Pour télécharger la machine virtuelle vulnérable, cliquez sur le lien suivant :",
        "password" => "Mot de passe du Défi n°",
        "confirm" => "Valider",
        "bravo" => " Bravo ! +10 points ! ",
        "already_val" => " Défi déjà validé ! ",
        "incorrect" => " Mot de passe incorrect ",
    );

    //challenge1
    $challenge1 = array(
        "challenge" => "Défi n°1",
        "title" => "Exploiter une vulnerability: Challenge n°1",
        "welcome" => "Bienvenue dans ce premier challenge !",
        "description" => "Voici une machine vulnérable avec un mot de passe à l'intérieur.",
        "goal" => " L'objectif : exploitez une vulnérabilité de la machine et trouvez le mot de passe pour obtenir ",
    );

    //RSA
    $rsa_course = array(
        "title" => "RSA : Rivest-Shamir-Adleman",
        "RSA" => "RSA (Rivest–Shamir–Adleman) est un algorithme de cryptographie asymétrique pour échanger des données confidentielles",
        "description1" => "L'idée de chiffrement asymétrique a été attribué à Whitfield Diffie and Martin Hellman, qui ont publié ce concept en 1976.",
        "description2" => "Clifford Cocks, un mathématicien britannique travaillant pour l'agence britannique de renseignement électromagnétique anglaise, 
        a développé un système équivalent en 1973, mais ce système n'a été déclassifié qu'en 1997.",
        "description3" => "C'est le cryptosystème à clé publique le plus utilisé. Il peut être utilisé pour fournir à la fois le secret et les signatures numériques et sa sécurité est basée sur l'insolvabilité du problème de factorisation d'entiers. ",
        "key_gen" => "Génération de clé",
        "step1" => "Générer deux grands nombres premiers aléatoires (et distincts) p et q.",
        "puce1.1" => "Pour des raisons de sécurité, les entiers <i>p</i> et <i>q</i> doivent être similaires en amplitude mais différer en longueur de quelques chiffres pour rendre la factorisation plus difficile. ",
        "puce1.2" => "<i>p</i> et <i>q</i> sont gardés secrets.",
        "step2" => "Calculer n = p*q",
        "puce2.1" => "<i>n</i> est utilisé comme module pour les clés publiques et privées. Sa longueur est la longueur de la clé",
        "puce2.2" => "<i>n</i> est publié dans le cadre de la clé publique.",
        "puce2.3" => "Calculer φ(n) = (p - 1)(q - 1), Fonction Totient d'Euler.",
        "puce2.4" => "><i>φ(n)</i> est gardé secret",
        "step3" => "Sélectionnez un entier aléatoire <i>e</i> tel que 1 < e < φ(n), tel que pgcd(e; φ(n)) = 1",
        "puce3.1" => "<i>e</i> et <i>φ(n)</i> sont premiers entre eux",
        "step4" => "Utilisez l'algorithme de Bezout pour calculer efficacement l'entier unique <i>d</i>, tel que :",
        "puce4.1" => "e*d = 1 mod φ(n).",
        "puce4.2" => "d = e<sup>-1</sup> mod (p-1)(q-1)",
        "key_info1" => "p et q ne sont plus nécessaires. Ils doivent être jetés, jamais révélés.",
        "key_info2" => "Les entiers <i>e</i> et <i>d</i> dans la génération de clé RSA sont appelés l'exposant de chiffrement et l'exposant de déchiffrement,
        respectivement, tandis que <i>n</i> est appelé le module",
        "encryption" => "Chiffrement",
        "enc_info1" => "Obtenir la clé publique authentique (n; e).",
        "enc_info2" => "c = m<sup>e</sup> mod (n)",
        "decryption" => "Déchiffrement",
        "dec_info1" => "Pour récupérer le texte en clair, utilisez la clé privée <i>d</i>",
        "dec_info2" => "m = c<sup>d</sup> mod (n)",
    );

    $rsa_common_modulus= array (
        "common_modulus" => "Attaque du module commun",
        "description" => "L'une des attaques les plus simples pouvant être effectuées sur RSA",
        "scenario" => "Considérez un scénario où une personne chiffre le même texte brut, 2 fois différemment, et qu'il les envoie à 2 personnes différentes.
        Supposons que vous écoutiez la communication et que vous obteniez à la fois les textes chiffrés (c1, c2) et les exposants (e1, e2) qu'il a utilisés.
        Vous connaissez déjà son module <i>n</i> qui est public.",
        "decipher" => "Voyons comment vous pouvez déchiffrer le message.",
        "cipher1" => "c1 = M<sup>e1</sup> mod n",
        "cipher2" => "c2 = M<sup>e2</sup> mod n ",
        "bezout1" => "En utilisant le théorème de Bézout, nous pouvons trouver <i>a</i> et <i>b</i> tels que (e1 * a) + (e2 * b) = 1",
        "bezout2" => "alors nous pouvons décoder le texte brut comme (c1 ^ a) * (c2 ^ b).",
        "description2" => " Pour trouver a, puisque pgcd(e1, e2) = 1, on peut dire que l'une des valeurs est l'inverse multiplicatif modulaire de e1 et e2.
        Après en avoir trouvé un, nous pouvons substituer la valeur à l'équation ci-dessus afin que nous puissions réussir à obtenir l'autre. ",
        "description3" => "Un autre problème est que la valeur <i>a</i> ou <i>b</i> sera négative, il est donc difficile de l'appliquer dans l'équation.
        Donc, pour simplifier cela, nous devons trouver l'inverse multiplicatif modulaire du message chiffré avec la valeur négative. "
    );

    $rsa_chall = array(
        "challenge" => "Défi RSA",
        "title" => "Déchiffrer le message",
        "description" => "Nous avons intercepté un message, heureusement que vous êtes un expert pour le décrypter",
        "goal" => "Le but : le mot de passe est chiffré en hexadécimal, déchiffrez-le pour obtenir le flag"
    );

?>