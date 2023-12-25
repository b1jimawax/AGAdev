<?php
require "connexion.php";

if(isset($_POST['btnAjout']))
{
    $prenom = $_POST["nomapprenant"];
    $nom = $_POST["prenomapprenant"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dateNaiss = $_POST['dateNaiss']; 
    $filière = $_POST['Filière']; 
    $niveau = $_POST['Niveau']; 
    $hobbie = $_POST['hobbie']; 
    $sexe = $_POST['sexe']; 

    $photo = $_FILES["img"]["name"];
    $upload = "../assets/dist/picture/".$photo;

    move_uploaded_file($_FILES["img"]["tmp_name"], $upload);

    // Requête SQL pour insérer l'apprenant dans la base de données
    $sql = "INSERT INTO apprenants (nomapprenant, prenomapprenant,email,phone,dateNaiss,filière,niveau,hobbie,sexe, photo) 
    VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?)";
    
    // Préparation de la requête
    $stmt = $connexion->prepare($sql);
    
    // Exécution de la requête en liant les paramètres
    if ($stmt->execute([$prenom, $nom, $email, $phone, $dateNaiss, $filière, $niveau, $hobbie, $sexe, $photo])) {
        echo "Apprenant enregistré avec succès dans la base de données";
        header("Location: ../vue/listeApprenant.php");
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur lors de l'ajout de l'apprenant : " . $errorInfo[2];
    }
}

// Fermer la connexion à la base de données
$connexion = null;
?>
