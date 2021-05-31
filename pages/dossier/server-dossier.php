<?php 
    session_start();
    if(!isset($_SESSION['success'])){
        header('location: ../index.php');
    }

    $ftp_server = "localhost";
    $db = mysqli_connect('localhost', 'root', '', 'agorae');
    $query = "SET NAMES utf8";
    mysqli_query($db, $query);

    if($_GET['etat'] == "reprise"){
        $id = $_SESSION['idUser'];
        //Update de l'etat du dossier dans la base
        $query = "SELECT Etat FROM dossier WHERE id_utilisateur='$id'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $ligne = $results->fetch_assoc();
            $etat = $ligne['Etat'];
            header("location: $etat.php");
        }  
    }

    switch($_GET['etat']){
        //Creation dossier
        case "creation":
            $id = $_SESSION['idUser'];

            //Creation dossier dans la base
            $query = "INSERT INTO dossier(id_utilisateur) VALUES('$id')";
            mysqli_query($db, $query);

            //Recup du n° de dossier
            $query = "SELECT id FROM dossier WHERE id_utilisateur='$id'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {
                $ligne = $results->fetch_assoc();
                $_SESSION['dossier'] = $ligne['id'];
            }

            $idDossier = $_SESSION['dossier'];
            $query = "UPDATE utilisateurs SET id_dossier='$idDossier' WHERE id='$id'";
            mysqli_query($db, $query);

            //Update de l'etat du dossier dans la base
            $query = "UPDATE dossier SET Etat='etat-civil' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page etat-civil
            header('location: etat-civil.php');
            break;

        case "etatCivil":
            $idDossier = $_SESSION['dossier'];
            $sexe = $_POST['etatCivil_sexe'];
            $adresse = $_POST['etatCivil_adresse'];
            $adresseComp = $_POST['etatCivil_adresseComp'];
            $CP = $_POST['etatCivil_CP'];
            $ville = $_POST['etatCivil_ville'];
            $tel = $_POST['etatCivil_tel'];
            $etablissement = $_POST['etatCivil_etablissement'];
            $nationalite = $_POST['etatCivil_nationalite'];

            //Creation etatCivil dans la base si pas créer
            $query = "INSERT INTO etat_civil(id_dossier) VALUES('$idDossier')";
            mysqli_query($db, $query);

            //update si infos modifiées
            $query = "UPDATE etat_civil SET sexe='$sexe', adresse='$adresse', adresseComp='$adresseComp', CP='$CP', ville='$ville', tel='$tel', etablissement='$etablissement', nationalite='$nationalite' WHERE id_dossier='$idDossier'";
            mysqli_query($db, $query);
            
            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='situation' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page situation
            header('location: situation.php');
            break;

        case "situation":
            $idDossier = $_SESSION['dossier'];
            $situation = $_POST['situation'];
            $declaFiscale = $_POST['situation_declaFiscale'];
            $declaFiscaleDate = $_POST['situation_declaFiscaleDate'];
            $declaFiscaleMontant = $_POST['situation_declaFiscaleMontant'];
            $activiteSalariee = $_POST['situation_activiteSalariee'];
            $activiteSalarieeContrat = $_POST['situation_activiteSalarieeContrat'];
            $activiteSalarieeDebut = $_POST['situation_activiteSalarieeDebut'];
            $activiteSalarieeFin = $_POST['situation_activiteSalarieeFin'];
            $activiteSalarieeNature = $_POST['situation_activiteSalarieeNature'];

            //Creation situation dans la base si pas créer
            $query = "INSERT INTO situation(id_dossier) VALUES('$idDossier')";
            mysqli_query($db, $query);

            //update si infos modifiées
            $query = "UPDATE situation SET situation='$situation', declaFiscale='$declaFiscale', declaFiscaleDate='$declaFiscaleDate', declaFiscaleMontant='$declaFiscaleMontant', activiteSalariee='$activiteSalariee', activiteSalarieeContrat='$activiteSalarieeContrat', activiteSalarieeDebut='$activiteSalarieeDebut', activiteSalarieeFin='$activiteSalarieeFin', activiteSalarieeNature='$activiteSalarieeNature' WHERE id_dossier='$idDossier'";
            mysqli_query($db, $query);
            
            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='compo-foyer' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page situation
            header('location: compo-foyer.php');
            break;

        case "compo-foyer":
            $idDossier = $_SESSION['dossier'];
            $NombrePersonnes = $_POST['compoFoyer_NombrePersonnes'];
            $NombreMineurs = $_POST['compoFoyer_NombreMineurs'];
            $NombrePersonnesCharge = $_POST['compoFoyer_NombrePersonnesCharge'];
            $NombreScolarise = $_POST['compoFoyer_NombreScolarise'];
            $Observations = $_POST['compoFoyer_observations'];
            $NombrePersonnesRAV = $_POST['compoFoyer_NombrePersonnesRAV'];

            //Creation situation dans la base si pas créer
            $query = "INSERT INTO compo_foyer(id_dossier) VALUES('$idDossier')";
            mysqli_query($db, $query);

            //update si infos modifiées
            $query = "UPDATE compo_foyer SET NombrePersonnes='$NombrePersonnes', NombreMineurs='$NombreMineurs', NombrePersonnesCharge='$NombrePersonnesCharge', NombreScolarise='$NombreScolarise', Observations='$Observations', NombrePersonnesRAV='$NombrePersonnesRAV' WHERE id_dossier='$idDossier'";
            mysqli_query($db, $query);
            
            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='etudes-cas' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page situation
            header('location: etudes-cas.php');
            break;

        case "etudes-cas":
            $idDossier = $_SESSION['dossier'];
            $Niveau = $_POST['etudesCas_Niveau'];
            $Bourses = $_POST['etudesCas_Bourses'];
            $BoursesMontant = $_POST['etudesCas_BoursesMontant'];
            $LogeResidence = $_POST['etudesCas_LogeResidence'];
            $BeneficiaireEpicerie = $_POST['etudesCas_BeneficiaireEpicerie'];
            $ExplicationCas = $_POST['etudesCas_ExplicationCas'];

            //Creation situation dans la base si pas créer
            $query = "INSERT INTO etudes_cas(id_dossier) VALUES('$idDossier')";
            mysqli_query($db, $query);

            //update si infos modifiées
            $query = "UPDATE etudes_cas SET Niveau='$Niveau', Bourses='$Bourses', BoursesMontant='$BoursesMontant', LogeResidence='$LogeResidence', BeneficiaireEpicerie='$BeneficiaireEpicerie', ExplicationCas='$ExplicationCas' WHERE id_dossier='$idDossier'";
            mysqli_query($db, $query);
            
            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='ressources-charges' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page situation
            header('location: ressources-charges.php');
            break;

        case "ressources-charges":
            $idDossier = $_SESSION['dossier'];
            
            $Ressources_Revenus = $_POST['Ressources_Revenus'];
            $Ressources_Bourses = $_POST['Ressources_Bourses'];
            $Ressources_AAH = $_POST['Ressources_AAH'];
            $Ressources_AllocFamiliale = $_POST['Ressources_AllocFamiliale'];
            $Ressources_AllocLogement = $_POST['Ressources_AllocLogement'];
            $Ressources_PensionAlimentaire = $_POST['Ressources_PensionAlimentaire'];
            $Ressources_AidesFamiliales = $_POST['Ressources_AidesFamiliales'];
            $Ressources_Autres = $_POST['Ressources_Autres'];

            $Charges_Loyer = $_POST['Charges_Loyer'];
            $Charges_ElecGaz = $_POST['Charges_ElecGaz'];
            $Charges_Eau = $_POST['Charges_Eau'];
            $Charges_Tel = $_POST['Charges_Tel'];
            $Charges_Internet = $_POST['Charges_Internet'];
            $Charges_Assurances = $_POST['Charges_Assurances'];
            $Charges_FraisTransport = $_POST['Charges_FraisTransport'];
            $Charges_Emprunts = $_POST['Charges_Emprunts'];
            $Charges_TropPercu = $_POST['Charges_TropPercu'];
            $Charges_Impots = $_POST['Charges_Impots'];
            $Charges_FraisGarde = $_POST['Charges_FraisGarde'];
            $Charges_PensionAlimentaire = $_POST['Charges_PensionAlimentaire'];
            $Charges_Autres = $_POST['Charges_Autres'];

            //Creation situation dans la base si pas créer
            $query = "INSERT INTO ressources_charges(id_dossier) VALUES('$idDossier')";
            mysqli_query($db, $query);

            //update si infos modifiées
            $query = "UPDATE ressources_charges 
            SET Ressources_Revenus='$Ressources_Revenus', 
            Ressources_Bourses='$Ressources_Bourses', 
            Ressources_AAH='$Ressources_AAH', 
            Ressources_AllocFamiliale='$Ressources_AllocFamiliale', 
            Ressources_AllocLogement='$Ressources_AllocLogement' ,
            Ressources_PensionAlimentaire='$Ressources_PensionAlimentaire', 
            Ressources_AidesFamiliales='$Ressources_AidesFamiliales', 
            Ressources_Autres='$Ressources_Autres',
            Charges_Loyer='$Charges_Loyer', 
            Charges_ElecGaz='$Charges_ElecGaz', 
            Charges_Eau='$Charges_Eau', 
            Charges_Tel='$Charges_Tel', 
            Charges_Internet='$Charges_Internet' ,
            Charges_Assurances='$Charges_Assurances', 
            Charges_FraisTransport='$Charges_FraisTransport', 
            Charges_Emprunts='$Charges_Emprunts',
            Charges_TropPercu='$Charges_TropPercu', 
            Charges_Impots='$Charges_Impots', 
            Charges_FraisGarde='$Charges_FraisGarde',
            Charges_PensionAlimentaire='$Charges_PensionAlimentaire', 
            Charges_Autres='$Charges_Autres'
            WHERE id_dossier='$idDossier'";
            
            mysqli_query($db, $query);
            
            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='pieces' WHERE id='$idDossier'";
            mysqli_query($db, $query);

            //Redirection vers la page situation
            header('location: pieces.php');
            break;

        case "pieces":
            $idDossier = $_SESSION['dossier'];

            $CertifScolariteExt = $_FILES["pieces_CertifScolarite"]['name'];
            $CertifScolarite = $_FILES["pieces_CertifScolarite"]['tmp_name'];

            $PhotoExt = $_FILES["pieces_Photo"]['name'];
            $Photo = $_FILES["pieces_Photo"]['tmp_name'];

            $LivretFamilleExt = $_FILES["pieces_LivretFamille"]['name'];
            $LivretFamille = $_FILES["pieces_LivretFamille"]['tmp_name'];

            $ImpotsExt = $_FILES["pieces_Impots"]['name'];
            $Impots = $_FILES["pieces_Impots"]['tmp_name'];

            $SalaireExt = $_FILES["pieces_Salaire"]['name'];
            $Salaire = $_FILES["pieces_Salaire"]['tmp_name'];

            $BoursesExt = $_FILES["pieces_Bourses"]['name'];
            $Bourses = $_FILES["pieces_Bourses"]['tmp_name'];

            $AttestationCafExt = $_FILES["pieces_AttestationCaf"]['name'];
            $AttestationCaf = $_FILES["pieces_AttestationCaf"]['tmp_name'];

            $CompteBancaireExt = $_FILES["pieces_CompteBancaire"]['name'];
            $CompteBancaire = $_FILES["pieces_CompteBancaire"]['tmp_name'];

            $BailLoyerExt = $_FILES["pieces_BailLoyer"]['name'];
            $BailLoyer = $_FILES["pieces_BailLoyer"]['tmp_name'];

            $PensionAttestationExt = $_FILES["pieces_PensionAttestation"]['name'];
            $PensionAttestation = $_FILES["pieces_PensionAttestation"]['tmp_name'];
            
            $conn = ftp_connect($ftp_server);
            ftp_login($conn, "agorae", "");
            ftp_mkdir($conn, $idDossier);
            $query = "INSERT INTO pieces(id_dossier) VALUES ('$idDossier')";
            mysqli_query($db, $query);

            $ext = pathinfo($CertifScolariteExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/Certificat-Scolarite-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $CertifScolarite, FTP_BINARY)){
                $query = "UPDATE pieces SET CertifScolarite='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
                

            $ext = pathinfo($PhotoExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/Photo-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $Photo, FTP_BINARY)){
                $query = "UPDATE pieces SET Photo='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
                

            $ext = pathinfo($LivretFamilleExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/LivretFamille-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $LivretFamille, FTP_BINARY)){
                $query = "UPDATE pieces SET LivretFamille='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($ImpotsExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/Impots-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $Impots, FTP_BINARY)){
                $query = "UPDATE pieces SET Impots='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($SalaireExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/Salaire-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $Salaire, FTP_BINARY)){
                $query = "UPDATE pieces SET Salaire='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($BoursesExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/Bourses-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $Bourses, FTP_BINARY)){
                $query = "UPDATE pieces SET Bourses='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($AttestationCafExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/AttestationCaf-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $AttestationCaf, FTP_BINARY)){
                $query = "UPDATE pieces SET AttestationCaf='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($CompteBancaireExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/CompteBancaire-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $CompteBancaire, FTP_BINARY)){
                $query = "UPDATE pieces SET CompteBancaire='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($BailLoyerExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/BailLoyer-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $BailLoyer, FTP_BINARY)){
                $query = "UPDATE pieces SET BailLoyer='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            

            $ext = pathinfo($PensionAttestationExt, PATHINFO_EXTENSION);
            $dest = "{$idDossier}/PensionAttestation-{$idDossier}.{$ext}";
            if(ftp_put($conn, $dest, $PensionAttestation, FTP_BINARY)){
                $query = "UPDATE pieces SET PensionAttestation='$dest' WHERE id_dossier='$idDossier'";
                mysqli_query($db, $query);
            }
            
            ftp_close($conn);

            //Update de l'état du dossier
            $query = "UPDATE dossier SET Etat='en-attente', dateDemande=CURRENT_TIMESTAMP WHERE id='$idDossier'";
            mysqli_query($db, $query);

            header("location: en-attente.php");
            break;
    }

?>