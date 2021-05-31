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
               <td>Identifiant</td>
               <td>Nom</td>
               <td>Prénom</td>
               <td>N° Dossier</td>
               <td>Adresse Email</td>
               <td>Level Utilisateur</td>
               <?php if($_SESSION['lvl'] == 2) : ?>
               <td>Supprimer</td>
             <?php endif;?>
             </tr>
           <?php
           $query = "SELECT * FROM utilisateurs ORDER BY nom";
           $result = mysqli_query($conn, $query);
           while($ligne = $result->fetch_assoc()){?>
             <tr>
               <td><?php echo $ligne['id']; ?></td>
               <td><?php echo $ligne['nom']; ?></td>
               <td><?php echo $ligne['prenom']; ?></td>
               <td><?php echo $ligne['id_dossier']; ?></td>
               <td><?php echo $ligne['email']; ?></td>
               <td><?php echo $ligne['level_user']; ?></td>
               <?php if($_SESSION['lvl'] == 2 && $ligne['level_user'] < 2) : ?>
               <td class="remove">
                 <form style="background: transparent" id="delete<?php echo($ligne['id'])?>" action="../connect/server.php" method="post"><input type="hidden" name="user" value="<?php echo($ligne['id']); ?>">
                 <a onclick='document.getElementById("delete<?php echo($ligne['id'])?>").submit()'><img src="../img/remove.png"></a></form></td>
             <?php endif;?>
             </tr>
           <?php } ?>
         </table>
         </div>
       </div>
     </div>
   </BODY>
 </HTML>
