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
           <h3>Situation Familiale</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <form action="server-dossier.php?etat=situation" method="post">
                <label>Situation </label><br><input class="check" type="radio" name="situation" value="Celibataire"><label>Célibataire</label>
                    <input class="check" type="radio" name="situation" value="Marie"><label>Marié(e)</label>
                    <input class="check" type="radio" name="situation" value="Divorce"><label>Divorcé(e)</label>
                    <input class="check" type="radio" name="situation" value="Concubinage"><label>Concubinage</label>
                    <input class="check" type="radio" name="situation" value="Pacse"><label>Pacsé(e)</label><br>
                <label>Déclarion fiscale indépendante </label><br>
                    <input type="radio" class="check" name="situation_declaFiscale" value="Oui"><label>Oui</label>
                    <input type="radio" class="check" name="situation_declaFiscale" value="Non"><label>Non</label><br>
                <label>Depuis quand ? </label>
                    <input type="date" name="situation_declaFiscaleDate"><br>
                <label>Dernier montant annuel déclaré </label>
                    <input type="number" step="any" name="situation_declaFiscaleMontant"><br>
                <label>Exercez-vous une activité salariée ? </label><br>
                    <input type="radio" class="check" name="situation_activiteSalariee" value="Oui"><label>Oui</label>
                    <input type="radio" class="check" name="situation_activiteSalariee" value="Non"><label>Non</label><br>
                <label>Type de contrat </label><br>
                    <input type="radio" class="check" name="situation_activiteSalarieeContrat" value="CDD"><label>CDD</label>
                    <input type="radio" class="check" name="situation_activiteSalarieeContrat" value="CDI"><label>CDI</label><br>
                <label>Début </label>
                    <input type="date" name="situation_activiteSalarieeDebut"><br>
                <label>Fin </label>
                    <input type="date" name="situation_activiteSalarieeFin"><br>
                <label>Nature de l'emploi </label>
                    <input type="text" name="situation_activiteSalarieeNature"><br>

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
