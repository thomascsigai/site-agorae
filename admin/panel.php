<?php
  session_start();
  if(!isset($_SESSION['success']) || $_SESSION['lvl'] == 0){
    header('location: ../index.php');
  }
?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../css/styleAdmin.css">
     <meta charset="utf-8"/>
   </HEAD>
   <BODY>
     <header>
       <a href="../index.php">Retour Accueil</a>
     </header>
     <div class="content">
       <div class="container">
         <div class="containerSmall">
             <img src="../img/user.png" alt="user.png" id="image">
             <a href="users.php" id="boutonValider">Consulter Utilisateurs</a>
         </div>
         <div class="containerSmall">
             <img src="../img/file.png" alt="file.png" id="image">
             <a href="dossiers-en-attente.php" id="boutonValider">Dossiers en attente</a>
         </div>
         <div class="containerSmall">
             <img src="../img/folder.png" alt="user.png" id="image">
             <a href="dossiers-archives.php" id="boutonValider">Consulter Dossiers Archivés</a>
         </div>
         <div class="containerSmall">
             <img src="../img/newspaper.png" alt="user.png" id="image">
             <a href="" id="boutonValider">Ajouter/Supprimer Actualité</a>
         </div>
         <div class="containerSmall">
             <img src="../img/clock.png" alt="user.png" id="image">
             <a href="" id="boutonValider">Modifier horaires Ouverture</a>
         </div>
       </div>
     </div>
   </BODY>
 </HTML>
