<?php
require "connexion.php";

if(isset($_POST['btnAjout']))
{
    $prenom = $_POST["prenomapprenant"];
    $nom = $_POST["nomapprenant"];
    $email = $_POST["email"];

    $photo = $_FILES["img"]["name"];
    $upload = "picture/".$photo;

    move_uploaded_file($_FILES["img"]["tmp_name"], $upload);

    // Requête SQL pour insérer l'apprenant dans la base de données
    $sql = "INSERT INTO apprenants (prenomapprenant, nomapprenant, email, photo) VALUES (?, ?, ?, ?)";
    
    // Préparation de la requête
    $stmt = $connexion->prepare($sql);
    
    // Exécution de la requête en liant les paramètres
    if ($stmt->execute([$prenom, $nom, $email, $photo])) {
        echo "Apprenant enregistré avec succès dans la base de données";
        header("Location: listeApprenant.php");
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur lors de l'ajout de l'apprenant : " . $errorInfo[2];
    }
}

// Fermer la connexion à la base de données
$connexion = null;
?>
