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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href= style1.css rel= stylesheet type= text/css >
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../style.css">

    <title>Docker</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
  </head>
    <body style="background-color: rgba(45,54,69)">

      <?php 
      require_once('menuCourses.php');
      ?>

      <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
        <div class="breadcrumb">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index">Home</a></li>
                <li class="breadcrumb-item"><a href="../course">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Docker Documentation</li>
              </ol>
            </nav>
        </div>
        <h1>Docker</h1><br></br>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="group col-sm-8">
            <h2 style="text-align: justify; color: white; margin-bottom: 4%; margin-top: 7%">Docker Overview</h2>
            <p1>
              Docker is an open platform for developing, shipping, and running applications. Docker enables you to separate your applications from your infrastructure so you can deliver software quickly. With Docker, you can manage your infrastructure in the same ways you manage your applications. By taking advantage of Docker’s methodologies for shipping, testing, and deploying code quickly, you can significantly reduce the delay between writing code and running it in production
              <h3 style="text-align: justify; color: white; margin-bottom: 3%; margin-top: 4%">Docker Plateform</h3  >
              Docker provides the ability to package and run an application in a loosely isolated environment called a container. The isolation and security allows you to run many containers simultaneously on a given host. Containers are lightweight and contain everything needed to run the application, so you do not need to rely on what is currently installed on the host. You can easily share containers while you work, and be sure that everyone you share with gets the same container that works in the same way.<br></br>
              Docker provides tooling and a platform to manage the lifecycle of your containers:
            </p1>
            <ul>
              <li>
                Develop your application and its supporting components using containers.
              </li>
              <li>
                They use Docker to push their applications into a test environment and execute automated and manual tests.
              </li>
              <li>
                When developers find bugs, they can fix them in the development environment and redeploy them to the test environment for testing and validation.
              </li>
              <li>
                When testing is complete, getting the fix to the customer is as simple as pushing the updated image to the production environment.
              </li>
            </ul>
            <p1>
              Docker’s container-based platform allows for highly portable workloads. Docker containers can run on a developer’s local laptop, on physical or virtual machines in a data center, on cloud providers, or in a mixture of environments.<br></br>
              Docker is lightweight and fast. It provides a viable, cost-effective alternative to hypervisor-based virtual machines, so you can use more of your compute capacity to achieve your business goals. Docker is perfect for high density environments and for small and medium deployments where you need to do more with fewer resources.
              <h3 style="text-align: justify; color: white; margin-bottom: 3%; margin-top: 4%">Docker architecture</h3>
              Docker uses a client-server architecture. The Docker client talks to the Docker daemon, which does the heavy lifting of building, running, and distributing your Docker containers. The Docker client and daemon can run on the same system, or you can connect a Docker client to a remote Docker daemon. The Docker client and daemon communicate using a REST API, over UNIX sockets or a network interface. Another Docker client is Docker Compose, that lets you work with applications consisting of a set of containers.
              <img src="../images/architecture.svg" class="img-fluid" style="margin-top: 5%; margin-bottom: 5%"/>
              
              <h3 style="text-align: justify; color: white; margin-bottom: 2%; margin-top: 4%">Docker Desktop</h3>
             
              Docker Desktop is an easy-to-install application for your Mac or Windows environment that enables you to build and share containerized applications and microservices. Docker Desktop includes the Docker daemon (dockerd), the Docker client (docker), Docker Compose, Docker Content Trust, Kubernetes, and Credential Helper. For more information: 
              <a target="_blank" style="text-decoration:underline" href="https://docs.docker.com/desktop/">Docker Desktop</a>
              <h3 style="text-align: justify; color: white; margin-bottom: 2%; margin-top: 2%">Docker Objects</h3>
              When you use Docker, you are creating and using images, containers, networks, volumes, plugins, and other objects. This section is a brief overview of some of those objects.
              
              <h4 style="text-align: justify; color: white; margin-bottom: 2%; margin-top: 2%">Images</h4>
              An image is a read-only template with instructions for creating a Docker container. Often, an image is based on another image, with some additional customization. For example, you may build an image which is based on the ubuntu image, but installs the Apache web server and your application, as well as the configuration details needed to make your application run.
              You might create your own images or you might only use those created by others and published in a registry. To build your own image, you create a Dockerfile with a simple syntax for defining the steps needed to create the image and run it. Each instruction in a Dockerfile creates a layer in the image. When you change the Dockerfile and rebuild the image, only those layers which have changed are rebuilt. This is part of what makes images so lightweight, small, and fast, when compared to other virtualization technologies.
              
              <h4 style="text-align: justify; color: white; margin-bottom: 2%; margin-top: 2%">Containers</h4>
              A container is a runnable instance of an image. You can create, start, stop, move, or delete a container using the Docker API or CLI. You can connect a container to one or more networks, attach storage to it, or even create a new image based on its current state.<br></br>
              By default, a container is relatively well isolated from other containers and its host machine. You can control how isolated a container’s network, storage, or other underlying subsystems are from other containers or from the host machine.<br></br>
              A container is defined by its image as well as any configuration options you provide to it when you create or start it. When a container is removed, any changes to its state that are not stored in persistent storage disappear.
              If you want more information about Docker you can click here: <a target="_blank" style="text-decoration:underline" href="https://docs.docker.com/">Docker docs</a>
            </p1>         
          </div>
        </div>
      </div>
      <?php
          require_once('footerCourses.php');
      ?>
    </body>
</html>
