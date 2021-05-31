<?php session_start(); ?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="css/style.css">
     <meta charset="utf-8"/>
   </HEAD>
   <BODY>
     <header class="main-header">
       <div class="logo-id">
         <div class="logo">
           <img src="img/logo_agorae.png" alt="logo_agorae">
           <h2>Valenciennes</h2>
         </div>
         <?php
         if(!isset($_SESSION['success']))
            echo ('<a href="connect/auth.php">S&#39identifier</a>');
            else {?>
              <p style="color: white;margin: 10px;"><?php echo $_SESSION['email'];?> <a href="connect/logout.php">Se déconnecter</a></p>
                <?php
              }
          ?>
       </div>
       <div class="nav-bar">
         <a href="#" class="bouton" id="active">Accueil</a>
         <a href="pages/dossier.php" class="bouton">Créer Son Dossier</a>
         <a href="pages/simu.php" class="bouton">Simulateur</a>
         <a href="pages/qui-sommes-nous.php" class="bouton">Qui sommes-nous ?</a>
       </div>
     </header>

     <div class="content">
       <div class="container">
         <div class="containerSmall">
           <h3>Lorem Ipsum</h3>
           <hr>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, tortor ut ultricies convallis, massa felis varius mi, sit amet aliquet ex nunc quis enim. Duis felis dolor, condimentum ut mauris sit amet, venenatis blandit ex. Etiam sodales elementum blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris suscipit turpis at malesuada imperdiet. Suspendisse imperdiet varius laoreet. Integer auctor arcu maximus dui aliquam condimentum. Curabitur pharetra congue vulputate. Quisque est ligula, condimentum eget sagittis sed, vulputate eu urna. Phasellus in ex tempus, laoreet tortor et, iaculis nunc. Mauris dapibus quis purus nec tempor.
Proin enim libero, condimentum non fermentum facilisis, convallis sed magna. Proin dapibus vehicula quam, vitae mollis lectus feugiat et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus id varius nibh. Duis et neque aliquam, volutpat lorem in, ultrices metus. In hac habitasse platea dictumst. Aenean eleifend tempus purus.
</p>
         </div>
       </div>
       <div class="container">
         <div class="containerSmall">
           <h3>Infos</h3>
           <hr>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, tortor ut ultricies convallis, massa felis varius mi, sit amet aliquet ex nunc quis enim. Duis felis dolor, condimentum ut mauris sit amet, venenatis blandit ex. Etiam</p>
         </div>
         <div class="containerSmall">
           <h3>Horaires</h3>
           <hr>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, tortor ut ultricies convallis, massa felis varius mi, sit amet aliquet ex nunc quis enim. Duis felis dolor, condimentum ut mauris sit amet, venenatis blandit ex. Etiam</p>
         </div>
       </div>
     </div>

     <footer>
      <div><?php if(isset($_SESSION['success'])) : ?>
         <?php if ($_SESSION['lvl'] > 0) : ?>
         <a href="admin/panel.php">Panneau Administrateur - </a>
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
