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
           <h3>Ressources & Charges</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <form action="server-dossier.php?etat=ressources-charges" method="post">
              <h4>Ressources</h4>
                <p>Revenus et indemnités <input type="number" name="Ressources_Revenus"></p>
                <p>Bourse d'étude <input type="number" name="Ressources_Bourses"></p>
                <p>AAH <input type="number" name="Ressources_AAH"></p>
                <p>Allocations familiales <input type="number" name="Ressources_AllocFamiliale"></p>
                <p>Allocations Logement <input type="number" name="Ressources_AllocLogement"></p>
                <p>Pension alimentaire <input type="number" name="Ressources_PensionAlimentaire"></p>
                <p>Aides familiales <input type="number" name="Ressources_AidesFamiliales"></p>
                <p>Autres <input type="number" name="Ressources_Autres"></p>

                <!--DEPENSES-->
                <h4>Charges</h4>
                <p>Loyer (sans déduction APL ou AL) <input type="number" name="Charges_Loyer"></p>
                <p>Electricité / Gaz <input type="number" name="Charges_ElecGaz"></p>
                <p>Eau <input type="number" name="Charges_Eau"></p>
                <p>Téléphone portable / Fixe <input type="number" name="Charges_Tel"></p>
                <p>Internet <input type="number" name="Charges_Internet"></p>
                <p>Assurances (logement, véhicule, ...) <input type="number" name="Charges_Assurances"></p>
                <p>Frais de transport / Carburant (emploi, études) <input type="number" name="Charges_FraisTransport"></p>
                <p>Emprunts (frais d'inscription, permis) <input type="number" name="Charges_Emprunts"></p>
                <p>Trop-perçu CAF / CROUS ou AUTRES <input type="number" name="Charges_TropPercu"></p>
                <p>Taxe d'habitation / Divers impôt <input type="number" name="Charges_Impots"></p>
                <p>Frais de garde <input type="number" name="Charges_FraisGarde"></p>
                <p>Pension alimentaire <input type="number" name="Charges_PensionAlimentaire"></p>
                <p>Autres <input type="number" name="Charges_Autres"></p>
             
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
