<?php
  session_start();

  $email ="";
  $errors = array();

  $db = mysqli_connect('localhost', 'root', '', 'agorae');
  $query = "SET NAMES utf8";
  mysqli_query($db, $query);

  //CREER COMPTE
  if(isset($_POST['creerCompte'])){
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $user_check_query = "SELECT * FROM utilisateurs WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){
      if ($user['email'] === $email) {
        array_push($errors, "Adresse email déjà existante");
      }
    }
    if (count($errors) == 0) {
  	   $password = md5($password);

       $query = "INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES('$nom', '$prenom', '$email', '$password')";
       mysqli_query($db, $query);
       $_SESSION['email'] = $email;
  	   $_SESSION['success'] = "Vous êtes connecté";
       ?><br><p>  Compte créé, vous pouvez vous connecter.</p><br><?php
     }
  }

  //SE CONNECTER
  if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($db, $_POST['emailLogin']);
    $password = mysqli_real_escape_string($db, $_POST['passwordLogin']);

    if (count($errors) == 0) {
  	   $password = md5($password);
  	   $query = "SELECT * FROM utilisateurs WHERE email='$email' AND motdepasse='$password'";
  	   $results = mysqli_query($db, $query);
  	   if (mysqli_num_rows($results) == 1) {
         $ligne = $results->fetch_assoc();
         $_SESSION['idUser'] = $ligne['id'];
         $_SESSION['nom'] = $ligne['nom'];
         $_SESSION['prenom'] = $ligne['prenom'];
         $_SESSION['email'] = $email;
  	     $_SESSION['success'] = "Connecté";
         $_SESSION['lvl'] = $ligne['level_user'];
         $_SESSION['dossier'] = $ligne['id_dossier'];
  	     header('location: ../index.php');
  	   } else {
  		   array_push($errors, "Email/Mot de passe incorrect");
  	   }
     }
  }

  if(isset($_POST['user'])){
    $id = $_POST['user'];
    $result = mysqli_query($db,"DELETE FROM `utilisateurs` WHERE id = '".$id."'");
    header('location: ../admin/users.php');
  }
?>
