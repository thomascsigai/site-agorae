<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['success']) || $_SESSION['lvl'] == 0){
    header('location: ../index.php');
  }

  $idDossier = $_GET['id_dossier'];
  $idUser = $_GET['id'];
?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../css/styleAdminTable.css">
     <meta charset="utf-8"/>
   </HEAD>
   <BODY>
     <header>
       <a href="dossiers-en-attente.php">Retour</a>
     </header>
     <div class="content">
       <div class="container">
          <div class="containerSmall">
          <form action="server-admin.php?idDossier=<?php echo $idDossier;?>" method="post">
            <label>Référant Agoraé : </label>
              <select name="referant"><br>
                <?php
                  $query = "SELECT nom, prenom, id FROM utilisateurs WHERE level_user>0";
                  $result = mysqli_query($conn, $query);
                  while($ligne = $result->fetch_assoc()){
                    echo("<option value=".$ligne['id'].">".$ligne['nom']." ".$ligne['prenom']."</option>");
                  }
                ?>
                </select>
              <label>Date commission : </label>
                  <input type="date" name="dateComission">
                  <label>Decision Finale : </label><br><input class="check" type="radio" name="Refus" value="accepte"><label>Accepté</label><input class="check" type="radio" name="Refus" value="refuse"><label>Refusé</label><br>
              <label>Motif si refusé :</label>
              <textarea name="motif" row="10" cols="50"></textarea>
              <input style="background-color:#00F683;" type="submit" value="Envoyer">
            </form>
          </div>
       </div>
     </div>
   </BODY>
 </HTML>
