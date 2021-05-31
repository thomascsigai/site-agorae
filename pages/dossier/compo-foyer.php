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
           <h3>Composition du foyer</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <form action="server-dossier.php?etat=compo-foyer" method="post">
                <label>Nombre de personnes vivant le foyer </label>
                  <input type="number" name="compoFoyer_NombrePersonnes"><br>
                <label>Nombre de mineurs vivant le foyer </label>
                  <input type="number" name="compoFoyer_NombreMineurs"><br>
                <label>Nombre de personnes à charge vivant le foyer </label>
                  <input type="number" name="compoFoyer_NombrePersonnesCharge"><br>
                <label>Nombre de personnes scolarisées vivant le foyer </label>
                  <input type="number" name="compoFoyer_NombreScolarise"><br>
                <label>Observations </label><br>
                  <textarea name="compoFoyer_observations" row="10" cols="50"></textarea><br>
                <label>Nombre de personnes à prendre en compte dans le reste à vivre </label>
                  <input type="number" name="compoFoyer_NombrePersonnesRAV"><br>

                <br><input type="submit" id="boutonValider" value="Suivant">
              </form>
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
