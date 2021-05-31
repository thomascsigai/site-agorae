<?php session_start(); ?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../../css/style.css">
     <meta charset="utf-8"/>
   </HEAD>
   <BODY>
     <header class="main-header">
       <div class="logo-id">
         <div class="logo">
           <img src="../../img/logo_agorae.png" alt="logo_agorae">
           <h2>Valenciennes</h2>
         </div>
         <?php
         if(!isset($_SESSION['success']))
            echo ('<a href="../connect/auth.php">S&#39identifier</a>');
            else {?>
              <p style="color: white;margin: 10px;"><?php echo $_SESSION['email'];?> <a href="../../connect/logout.php">Se déconnecter</a></p>
                <?php
              }
          ?>
       </div>
       <div class="nav-bar">
         <a href="../../index.php" class="bouton">Accueil</a>
         <a href="../dossier.php" class="bouton" id="active">Créer Son Dossier</a>
         <a href="../simu.php" class="bouton">Simulateur</a>
         <a href="../qui-sommes-nous.php" class="bouton">Qui sommes-nous ?</a>
       </div>
     </header>

     <div class="content">
       <div class="containerThin">
         <div class="containerSmall">
           <h3>Dossier envoyé</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <p>Votre dossier a été transmis à l'équipe de l'Agoraé. Vous serez recontacter prochainement si nous avons besoin d'informations supplémentaires ou si nous avons clôturé votre dossier.</p>
              <?php
            }else {?>
                <p><a href="../../connect/auth.php">Connectez-vous</a> pour constituer ou consulter votre dossier</p>
                  <?php
                }
            ?>
         </div>
       </div>
     </div>

     <footer>
      <div><?php if(isset($_SESSION['success'])) : ?>
         <?php if ($_SESSION['lvl'] > 0) : ?>
         <a href="../../admin/panel.php">Panneau Administrateur - </a>
         <?php endif; ?>
       <?php endif; ?>
       
        <a href="">Mentions légales - </a>
        <a href="">Données personnelles - </a>
        <a href="">Contacter le webmaster</a>
       </div>
       <hr>
       <p>©La Fev - 1 Rue des Cent-Têtes, 59300 Valenciennes</p>
       <p>03 27 51 76 13</p>
     </footer>
   </BODY>
 </HTML>
