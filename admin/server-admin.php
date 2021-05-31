<?php 
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['success']) || $_SESSION['lvl'] == 0){
      header('location: ../index.php');
    }

    $idDossier = $_GET['idDossier'];

    $ref = $_POST['referant'];
    $dateCommission = $_POST['dateComission'];
    $motif = $_POST['motif'];
    $refus = $_POST['Refus'];

    $query = "UPDATE dossier SET Referant='$ref', dateCommission='$dateCommission', Etat='$refus', MotifRefus='$motif' WHERE id='$idDossier'";
    mysqli_query($conn, $query);

    header("location: dossiers-en-attente.php");

?>