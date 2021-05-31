<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['success']) || $_SESSION['lvl'] == 0){
    header('location: ../index.php');
  }
?>

<HTML>
   <HEAD>
     <TITLE>Agoraé Valenciennes</TITLE>
     <link rel="stylesheet" href="../css/styleAdminTable.css">
     <meta charset="utf-8"/>
   </HEAD>
   <BODY>
     <header>
       <a href="panel.php">Retour</a>
     </header>
     <div class="content">
       <div class="container">
         <div class="containerSmall">
           <table class="tableAffichage">
             <tr class="premiereLigne">
              <td>N° Dossier</td>
              <td>Nom</td>
              <td>Date Demande</td>
              <td>Date Commission</td>
              <td>Référant</td>
              <td>État</td>
              <td>Motif Si Refus</td>
              <td>Consulter le dossier</td>
             </tr>
           <?php
           $query = "SELECT * FROM dossier WHERE Etat='accepte' OR Etat='refuse'";
           $result = mysqli_query($conn, $query);
           while($ligne = $result->fetch_assoc()){
             $idDossier = $ligne['id'];
             $query1 = "SELECT nom, prenom, id FROM utilisateurs WHERE id_dossier='$idDossier'";
             $result1 = mysqli_query($conn, $query1);
             ?>
             <tr>
               <td><?php echo $ligne['id']; ?></td>
               <td><?php $ligne1 = $result1->fetch_assoc(); echo $ligne1['nom']; echo(" "); echo $ligne1['prenom'];?></td>
               <td><?php echo $ligne['dateDemande'];?></td>
               <td><?php echo $ligne['dateCommission'];?></td>
               <td><?php echo $ligne['Referant']; ?></td>
               <td><?php if($ligne['Etat'] == "accepte"){echo("Accepté");} else {echo("Refusé");} ?></td>
               <td><?php echo $ligne['MotifRefus']; ?></td>
               <td><a href="consulter-dossier-archive.php?id_dossier=<?php echo $idDossier;?>&id=<?php echo $ligne1['id'];?>">Consulter</a></td>
             </tr>
           <?php } ?>
         </table>
         </div>
       </div>
     </div>
   </BODY>
 </HTML>
