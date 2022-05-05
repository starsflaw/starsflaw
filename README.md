![](/images/deathstarw.png)

# Star's Flaw


##  The learning platform to learn about Cybersecurity / Pentest / Information systems security 

Star's Flaw is an learning platform that teaches cyber security through gamified real-world labs. We have courses, Capture The Flag and challenges to cater for different learning styles.

## Table of Contents:

   - [Installation](#installation)
   - [Prerequisites](#prerequisites)
      - [ORACLE VM VirtualBox](#installing-oracle-vm-virtualbox)
      - [Kali Linux](#installing-kali-linux)
      - [Metasploitable 2](#installing-metasploitable-2) 
   - [Features](#features)
   - [About us](#about-us)


## Installation

   - Cloning the project

      We are using Xampp to interact with the database and the web page. Go to [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html) if you want to download it.
      Then you need to clone the projet in xampp/htdocs/ and run apache and MySQL to display the web page.
      
   - Enabling extension gd in xampp folder
      Go to your xampp folder /xampp/php/php.ini-development and remove semicolon for extension=gd
      ![](/images/xampp_extension.png)
   
     

## Prerequisites

   You can access to all the prerequisites if you lauch the web page after sign in.
   
   The prerequisites are necessary for completing CTF and challenges.
   
   
   - ### **Installing ORACLE VM VirtualBox**
   
      First of all we are going to need VirtualBox. VirtualBox offers to virtualize your guest operating systems (OS) on a host machine. Called hypervisor, the application supports Windows, Linux, Mac OS X, Solaris, Free BSD, etc. systems as a host.

      To download VirtualBox, click on the following link:  [https://www.virtualbox.org/wiki/Downloads](https://www.virtualbox.org/wiki/Downloads)

      Then choose the version corresponding to your operating system.

      Once the executable has been downloaded, double click on it and launch the installation wizard. Leave the default settings and agree to continue with the installation during the Network Interfaces Warning. Finally, click on Install. If your computer asks if you want to install the Oracle Corporation peripheral software, accept by clicking Install.

      Voila VirtualBox is now installed! Now we can install our machines.
      
     
   - ### **Installing Kali linux**
   
      Kali Linux is a distribution grouping together all the tools necessary for the security tests of an information system.

      Go to Kali linux downloads virtual machines page ([https://www.kali.org/get-kali/#kali-virtual-machines](https://www.kali.org/get-kali/#kali-virtual-machines)).

      Then go to VirtualBox and click on *Create a New Virtual Machine*.
      
      Once the next windows appears, you need to provide the Kali linux ISO. The file is located in the folder where you download Kali.
     
      When you lauch Kali on your VM ware, the default username and password are "kali" and "kali".
      
   - ### **Installing Metasploitable 2**

      Metasploitable is an intentionally insecure Linux virtual machine.

      This VM is used for security training, to train in pentest tools and to train in different security testing techniques.

      By taking this VM by storm, one can gradually learn the most common vulnerabilities of vulnerable systems.

      To download Metasploitable, download the virtual hard drive from the site below:
      [https://sourceforge.net/projects/metasploitable/](https://sourceforge.net/projects/metasploitable/)
      
      Then, in VirtualBox, create a new virtual machine of Linux type and Ubuntu version (64-bit). During installation, check Use an existing virtual hard disk file and then select Metasploitable.vmdk
      
      ![](/images/metasploitable-prerequisite-1.png)
      
      Before starting your machine, do not forget to change the network access mode to Bridge access in the Configuration> Network tab.
      
      ![](/images/metasploitable-prerequisite-2.png)
      
      The login and password are "msfadmin" and "msfadmin".

      Your machines are now ready for use.



## Features

   - **4 Courses**       
        - 
        -
        -
        -
    
   - **3 levels of Challenges**
        - Easy  
        - Medium
        - Intermediate


   - **4 Capture The Flag**
        - 
        -
        -
        -

## About us

We are students in fourth year of engineering school, majoring in Cybersecurity at ESME Sudria.

As a student and future cybersecurity engineer, we wanted to learn the basics of how to secure an IT infrastructure.

Information systems are regularly attacked by "pirates" or "hackers ill-intentioned ”, for various reasons (economic, political, etc.). To overcome these cyber attacks, IT infrastructures must be tested through penetration tests to ensure the right level of security.

We then chose this project to learn how to conduct a test first. intrusion, the various attack methods and the corrective measures to apply. Then in the second step, we wanted to transmit our knowledge through a platform mixing courses and challenges in order to provide a fun education on the Security of information systems.

This is why we created Star's Flaw: to bring concepts of Pentesting and Cybersecurity more generally, for those who are interested.
