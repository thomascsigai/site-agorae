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
           <h3>État Civil</h3>
           <hr>
           <?php
           if(isset($_SESSION['success'])){
              ?>
              <!--ETAT CIVIL-->
              <form action="server-dossier.php?etat=etatCivil" method="post">
                <label>Nom </label><input type="text" placeholder="Nom" disabled value="<?php echo $_SESSION['nom'];?>"><br>
                <label>Prenom </label><input type="text" disabled value="<?php echo $_SESSION['prenom'];?>"><br>
                <label>Adresse Mail </label><input type="text" disabled value="<?php echo $_SESSION['email'];?>"><br>
                <label>Sexe </label><br><input class="check" type="radio" name="etatCivil_sexe" value="M"><label>M</label><input class="check" type="radio" name="etatCivil_sexe" value="F"><label>F</label><input class="check" type="radio" name="etatCivil_sexe" value="Autre"><label>Autre</label><br>
                <label>Adresse </label><input type="text" name="etatCivil_adresse"><br>
                <label>Complément d'adresse </label><input type="text" name="etatCivil_adresseComp"><br>
                <label>Code Postal </label><input type="text" name="etatCivil_CP"><br>
                <label>Ville </label><input type="text" name="etatCivil_ville"><br>
                <label>Téléphone </label><input type="text" name="etatCivil_tel"><br>
                <label>Etablissement </label><input type="text" name="etatCivil_etablissement"><br>
                <label>Nationalité </label><input type="text" name="etatCivil_nationalite"><br>

                <br><input type="submit" id="boutonValider" value="Suivant">
              </form>

              <!--SITUATION FAMILIALE
              <h4>Situation familiale</h4>
              <label>Situation </label><input type="radio" name="situationSP" value="Celib"><label>Célibataire</label>
                <input type="radio" name="situationSP" value="Marie"><label>Marié(e)</label>
                <input type="radio" name="situationSP" value="Divorce"><label>Divorcé(e)</label>
                <input type="radio" name="situationSP" value="Concu"><label>Concubinage</label>
                <input type="radio" name="situationSP" value="Pacs"><label>Pacsé(e)</label><br>
              <label>Déclarion fiscale indépendante </label>
                <input type="radio" name="declarationSP" value="Oui"><label>Oui</label>
                <input type="radio" name="declarationSP" value="Non"><label>Non</label><br>-->
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
