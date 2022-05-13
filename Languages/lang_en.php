<?php  

    $menu = array(
        "home" => "Home",
        "courses" => "Courses",
    );

    //Can be used for all challenges
    $challenge = array(
        "download" => "To download the vulnerable virtual machine, click on the following link: ",
        "password" => "Password for Challenge n°",
        "confirm" => "Confirm",
        "bravo" => " Congratulations !",
        "already_val" => " Challenge already validated ! ",
        "incorrect" => " Incorrect password !"
    );

    //challenge1
    $challenge1 = array(
        "challenge" => "Challenge n°1",
        "title" => "Exploit a vulnerability: Challenge n°1",
        "welcome" => "Welcome to this first challenge!",
        "description" => "Here is a vulnerable machine with a password inside.",
        "goal" => "The goal: exploit a vulnerability in the machine and find the password to get ",
    );

    //RSA
    $rsa_course = array(
        "title" => "RSA : Rivest-Shamir-Adleman",
        "RSA" => "RSA (Rivest–Shamir–Adleman) is a public-key cryptosystem that is widely used for secure data transmission. ",
        "description1" => "The idea of an asymmetric public-private key cryptosystem is attributed to Whitfield Diffie and Martin Hellman, who published this concept in 1976.",
        "description2" => "Clifford Cocks, an English mathematician working for the British intelligence agency Government Communications Headquarters (GCHQ), 
        had developed an equivalent system in 1973, but this was not declassified until 1997.",
        "description3" => "This is the most widely used public-key cryptosystem. It may be used to provide both secrecy and digital signatures and its security is based on the intractability of the integer factorization problem. ",
        "key_gen" => "Key Generation",
        "step1" => "Generate two large random (and distinct) primes p and q.",
        "puce1.1" => "For security purposes, the integers <i>p</i> and <i>q</i> should be similar in magnitude but differ in length by a few digits to make factoring harder. ",
        "puce1.2" => "<i>p</i> and <i>q</i> are kept secret.",
        "step2" => "Compute n = p*q",
        "puce2.1" => "<i>n</i> is used as the modulus for both the public and private keys. Its length is the key length",
        "puce2.2" => "<i>n</i> is released as part of the public key.",
        "puce2.3" => "Compute φ(n) = (p - 1)(q - 1), Euler Totient Function.",
        "puce2.4" => "><i>φ(n)</i> is kept secret",
        "step3" => "Select a random integer <i>e</i> such as 1 < e < φ(n), such that gcd(e; φ(n)) = 1",
        "puce3.1" => "<i>e</i> and <i>φ(n)</i> are coprime ",
        "step4" => "Use the Bezout algorithm to compute efficiently the unique integer <i>d</i>, such that :",
        "puce4.1" => "e*d = 1 mod φ(n).",
        "puce4.2" => "d = e<sup>-1</sup> mod (p-1)(q-1)",
        "key_info1" => "p and q are no longer needed. They should be discarded , never revealed.",
        "key_info2" => "The integers <i>e</i> and <i>d</i> in RSA key generation are called the encryption exponent and the decryption exponent, 
        respectively,while <i>n</i> is called the modulus",
        "encryption" => "Encryption",
        "enc_info1" => "Obtain authentic public key (n; e). ",
        "enc_info2" => "c = m<sup>e</sup> mod (n)",
        "decryption" => "Decryption",
        "dec_info1" => "To recover plaintext, use the private key <i>d</i>",
        "dec_info2" => "m = c<sup>d</sup> mod (n)",
    );

    $rsa_common_modulus= array (
        "common_modulus" => "Common modulus attack",
        "description" => "One of the simplest attack that can be performed on RSA",
        "scenario" => "Consider a scenario where a person encrypts same plain text, 2 different times, which he sends to 2 different people. 
        Suppose you eavesdropped on the communication and got both the cipher texts (c1, c2) and the exponents (e1, e2) he used. 
        You already know his modulus <i>n</i> which is public.",
        "decipher" => "Let’s see how you can decrypt the message.",
        "cipher1" => "c1 = M<sup>e1</sup> mod n",
        "cipher2" => "c2 = M<sup>e2</sup> mod n ",
        "bezout1" => "Using Bezout’s Theorem, we can find <i>a</i> and <i>b</i> such that (e1 * a) + (e2 * b) = 1 ",
        "bezout2" => "then we can decode the plain text as (c1 ^ a) * (c2 ^ b).",
        "description2" => " In order to find a, since gcd(e1, e2) = 1, we can say that one of the value is the modular multiplicative inverse of e1 and e2. 
        After finding one, we can substitute the value to the above equation so that we can successfully obtain the other. ",
        "description3" => "Another issue is that, the value <i>a</i> or <i>b</i> will be negative, hence it is difficult to apply in the equation. 
        So in order to simplify this, we need to find the modular multiplicative inverse of the ciphered message with the negative value. "
    );

    $rsa_chall = array(
        "challenge" => "RSA Challenge",
        "title" => "Decipher the message",
        "description" => "We intercepted a message, fortunately you are an expert to decrypt it",
        "goal" => "The goal: the password is encrypt in hexadecimal, decrypt it to get the flag"
    );

?>