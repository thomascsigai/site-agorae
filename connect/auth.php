<?php include('server.php'); ?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../css/style.css">
     <meta charset="utf-8"/>
     <script>
     var check = function() {
       if (document.getElementById('password').value ==
       document.getElementById('confirm_password').value) {
         document.getElementById('message').style.color = 'green';
         document.getElementById('message').innerHTML = 'Mots de passe identiques';
         document.getElementById("connect").disabled = false;
       } else {
         document.getElementById('message').style.color = 'red';
         document.getElementById('message').innerHTML = 'Mots de passe différents';
         document.getElementById("connect").disabled = true;
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
       </div>
       <div class="nav-bar">
         <a href="../index.php" class="bouton">Accueil</a>
         <a href="../pages/dossier.php" class="bouton">Créer Son Dossier</a>
         <a href="../pages/simu.php" class="bouton">Simulateur</a>
         <a href="../pages/qui-sommes-nous.php" class="bouton">Qui sommes-nous ?</a>
       </div>
     </header>

     <div class="content">
       <div class="container">
         <div class="containerSmall">
           <form method="post" action="auth.php">
             <h3>Se connecter</h3>
             <hr>
             <?php if(isset($_POST['login'])) include('errors.php'); ?>
             <label>Adresse mail : </label><input type="text" name="emailLogin" required><br>
             <label>Mot de passe : </label><input type="password" name="passwordLogin" required><br><br>
             <input class="login" type="submit" value="Se connecter" name="login">
           </form>
         </div>
       </div>
       <div class="container">
         <div class="containerSmall">
           <form method="post" action="auth.php">
             <h3>Créer un compte</h3>
             <hr>
             <?php if(isset($_POST['creerCompte'])) include('errors.php'); ?>
             <label>Nom : </label><input type="text" name="nom" required><br>
             <label>Prénom : </label><input type="text" name="prenom" required><br>
             <label>Adresse mail : </label><input type="email" name="email" required><br>
             <label>Mot de passe : </label><input type="password" name="password" id="password" onkeyup='check();' required><br>
             <label>Confirmer Mot de passe : </label><input type="password" id="confirm_password" onkeyup='check();' required><br>
             <span id="message"></span><br>
             <input class="login" type="submit" id="connect" name="creerCompte" value="Créer un compte" disabled="disabled">
           </form>
         </div>
       </div>
     </div>

     <footer>
       <h1>INFOS IMPORTANTES</h1>
     </footer>
   </BODY>
 </HTML>
