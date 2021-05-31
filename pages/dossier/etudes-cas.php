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
           <h3>Études et Explication du Cas</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <form action="server-dossier.php?etat=etudes-cas" method="post">
                <label>Niveau d'études actuel </label>
                <select name="etudesCas_Niveau" id="pet-select">
                  <option value="BAC">BAC</option>
                  <option value="BAC +1">BAC +1</option>
                  <option value="BAC +2">BAC +2</option>
                  <option value="BAC +3">BAC +3</option>
                  <option value="BAC +4">BAC +4</option>
                  <option value="BAC +5">BAC +5</option>
                  <option value="Plus de BAC +5">Plus de BAC +5</option>
                </select><br>
                <label>Touchez-vous une bourse de l'enseignement supérieur ? </label><br>
                    <input class="check" type="radio" name="etudesCas_Bourses" value="Oui"><label>Oui</label>
                    <input class="check" type="radio" name="etudesCas_Bourses" value="Non"><label>Non</label><br>
                <label>Montant annuel de la bourse </label>
                  <input type="number" step="any" name="etudesCas_BoursesMontant"><br>
                <label>Êtes-vous logé en résidence universaite CROUS ? </label><br>
                  <input class="check" type="radio" name="etudesCas_LogeResidence" value="Oui"><label>Oui</label>
                  <input class="check" type="radio" name="etudesCas_LogeResidence" value="Non"><label>Non</label><br>
                <label>Êtes-vous déjà bénéficiaire d'une épicerie solidaire ? </label><br>
                  <input class="check" type="radio" name="etudesCas_BeneficiaireEpicerie" value="Oui"><label>Oui</label>
                  <input class="check" type="radio" name="etudesCas_BeneficiaireEpicerie" value="Non"><label>Non</label><br>
                <label>Explication du Cas </label><br>
                  <textarea name="etudesCas_ExplicationCas" row="10" cols="50" placeholder="Expliquez ici pourquoi vous faites une demande à l'Agoraé."></textarea><br>
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
