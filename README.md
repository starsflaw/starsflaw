![](/images/deathstarw.png)

# Star's Flaw


##  The learning platform to learn about Cybersecurity / Pentest / Information systems security 

Star's Flaw is an learning platform that teaches cyber security through gamified real-world labs. We have courses, Capture The Flag and challenges to cater for different learning styles.

## Table of Contents:

   - [Installation](#installation)
   - [Features](#features)
   - [About us](#about-us)


## Installation

   - Cloning the project

      We are using Xampp to interact with the database and the web page. Go to [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html) if you want to download it.
      Then you need to clone the projet in xampp/htdocs/ and run apache and MySQL to display the web page.
      
   - Enabling extension gd in xampp folder
      Go to your xampp folder /xampp/php/php.ini-development and remove semicolon for extension=gd
      ![](/images/xampp_extension.png)
     
   - Downloading database for the first time:
   
     To download our database, go to starsflaw/db/install_BDD.php and execute this page.
     If it is not working, you need to modify the file install_BDD.php the user at line 5 or change the database name at line 7 and 18.

## Prerequisites

   You can access to all the prerequisites if you lauch the web page after sign in.
   
   The prerequisites are necessary for completing CTF and challenges.
   
## Features

   - **Courses**       
        
        A variety of courses to learn and to be used to solve our challenges.
        
   - **3 levels of Challenges**
        - Easy  
        - Medium
        - Intermediate

## About us

We are students in fourth year of engineering school, majoring in Cybersecurity at ESME Sudria.

As a student and future cybersecurity engineer, we wanted to learn the basics of how to secure an IT infrastructure.

Information systems are regularly attacked by "pirates" or "hackers ill-intentioned ”, for various reasons (economic, political, etc.). To overcome these cyber attacks, IT infrastructures must be tested through penetration tests to ensure the right level of security.

We then chose this project to learn how to conduct a test first. intrusion, the various attack methods and the corrective measures to apply. Then in the second step, we wanted to transmit our knowledge through a platform mixing courses and challenges in order to provide a fun education on the Security of information systems.

This is why we created Star's Flaw: to bring concepts of Pentesting and Cybersecurity more generally, for those who are interested.
