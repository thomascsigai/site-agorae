<?php session_start(); ?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../css/style.css">
     <meta charset="utf-8"/>
     <script>
      function simuler(){
        var arrR = document.getElementsByName('Ressource');
        var arrD = document.getElementsByName('Depense');
        var foyer = document.getElementsByName('Foyer');
        foyer = parseInt(foyer[0].value);
        var ressources = 0;
        var depenses = 0;
        var droit = 0;

        for(var i=0;i<arrR.length;i++){
          if(parseInt(arrR[i].value)){
            ressources += parseInt(arrR[i].value);}
        }

        for(var i=0;i<arrD.length;i++){
          if(parseInt(arrD[i].value)){
            depenses += parseInt(arrD[i].value);}
        }
      var rav = ((ressources - depenses)/foyer)/30;

      if(rav <= 7){
        if(rav <= 2) droit=1;
        else{
          if(rav <= 4) droit=2;
          else{
            if(rav <= 6) droit=3;
            else droit = 4;
          }
        }

        switch(droit){
          case 1:
            document.getElementById('result').innerHTML = '<div class="containerSmall" style="background-color:#31FF5A"><p>Vous avez le droit à 20 € par mois. Vous pouvez <a href="dossier.php">constituer votre dossier</a>.</p></div>';
          break;

          case 2:
            document.getElementById('result').innerHTML = '<div class="containerSmall" style="background-color:#31FF5A"><p>Vous avez le droit à 15 € par mois. Vous pouvez <a href="dossier.php">constituer votre dossier</a>.</p></div>';
          break;

          case 3:
            document.getElementById('result').innerHTML = '<div class="containerSmall" style="background-color:#31FF5A"><p>Vous avez le droit à 10 € par mois. Vous pouvez <a href="dossier.php">constituer votre dossier</a>.</p></div>';
          break;

          case 4:
            document.getElementById('result').innerHTML = '<div class="containerSmall" style="background-color:#31FF5A"><p>Vous avez le droit à 5 € par mois. Vous pouvez <a href="dossier.php">constituer votre dossier</a>.</p></div>';
          break;
        }
      } else {
        document.getElementById('result').innerHTML = '<div class="containerSmall" style="background-color:#FF7777"><p>Vous n&#39avez pas droit à l&#39Agoraé. Vous pouvez néanmoins <a href="dossier.php">constituer votre dossier</a>.</p></div>';
      }
    }
     </script>
   </HEAD>
   <BODY>
     <header class="main-header">
       <div class="logo-id">
         <div class="logo">
           <img src="../img/logo_agorae.png" alt="logo_agorae">
           <h2>Valenciennes</h2>
         </div>
         <?php
         if(!isset($_SESSION['success']))
            echo ('<a href="../connect/auth.php">S&#39identifier</a>');
            else {?>
              <p style="color: white;margin: 10px;"><?php echo $_SESSION['email'];?> <a href="../connect/logout.php">Se déconnecter</a></p>
                <?php
              }
          ?>
       </div>
       <div class="nav-bar">
         <a href="../index.php" class="bouton">Accueil</a>
         <a href="dossier.php" class="bouton">Créer Son Dossier</a>
         <a href="#" class="bouton" id="active">Simulateur</a>
         <a href="qui-sommes-nous.php" class="bouton">Qui sommes-nous ?</a>
       </div>
     </header>

     <div class="content">
       <div class="containerThin">
         <div class="containerSmall">
           <h3>Comment fonctionne le simulateur</h3>
           <hr>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, tortor ut ultricies convallis, massa felis varius mi, sit amet aliquet ex nunc quis enim. Duis felis dolor, condimentum ut mauris sit amet, venenatis blandit ex. Etiam sodales elementum blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris suscipit turpis at malesuada imperdiet. Suspendisse imperdiet varius laoreet. Integer auctor arcu maximus dui aliquam condimentum. Curabitur pharetra congue vulputate. Quisque est ligula, condimentum eget sagittis sed, vulputate eu urna. Phasellus in ex tempus, laoreet tortor et, iaculis nunc. Mauris dapibus quis purus nec tempor.
Proin enim libero, condimentum non fermentum facilisis, convallis sed magna. Proin dapibus vehicula quam, vitae mollis lectus feugiat et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus id varius nibh. Duis et neque aliquam, volutpat lorem in, ultrices metus. In hac habitasse platea dictumst. Aenean eleifend tempus purus.
</p>
         </div>
         <div class="containerSmall">
           <h3>Formulaire</h3>
           <hr>
           <p>Toutes les valeurs entrées sont en euros.</p>
           <form name="simulateur">
             <br><p>Nombre de personnes vivant dans le foyer <input type="number" name="Foyer"></p>
             <!--RESSOURCES-->
             <h4>Ressources</h4>
             <p>Revenus et indemnités <input type="number" name="Ressource"></p>
             <p>Bourse d'étude <input type="number" name="Ressource"></p>
             <p>AAH <input type="number" name="Ressource"></p>
             <p>Allocations familiales <input type="number" name="Ressource"></p>
             <p>Allocations Logement <input type="number" name="Ressource"></p>
             <p>Pension alimentaire <input type="number" name="Ressource"></p>
             <p>Aides familiales <input type="number" name="Ressource"></p>
             <p>Autres <input type="number" name="Ressource"></p>

             <!--DEPENSES-->
             <h4>Charges</h4>
             <p>Loyer (sans déduction APL ou AL) <input type="number" name="Depense"></p>
             <p>Electricité / Gaz <input type="number" name="Depense"></p>
             <p>Eau <input type="number" name="Depense"></p>
             <p>Téléphone portable / Fixe <input type="number" name="Depense"></p>
             <p>Internet <input type="number" name="Depense"></p>
             <p>Assurances (logement, véhicule, ...) <input type="number" name="Depense"></p>
             <p>Frais de transport / Carburant (emploi, études) <input type="number" name="Depense"></p>
             <p>Emprunts (frais d'inscription, permis) <input type="number" name="Depense"></p>
             <p>Trop-perçu CAF / CROUS ou AUTRES <input type="number" name="Depense"></p>
             <p>Taxe d'habitation / Divers impôt <input type="number" name="Depense"></p>
             <p>Frais de garde <input type="number" name="Depense"></p>
             <p>Pension alimentaire <input type="number" name="Depense"></p>
             <p>Autres <input type="number" name="Depense"></p>
             <br>
           </form>
         </div>
         <div id="result">
           <input type="button" id="boutonValider" name="valider" value="Consulter ses droits à l'Agoraé" onClick="simuler()">
         </div>
       </div>
     </div>

     <footer>
      <div><?php if(isset($_SESSION['success'])) : ?>
         <?php if ($_SESSION['lvl'] > 0) : ?>
         <a href="../admin/panel.php">Panneau Administrateur - </a>
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
