<?php
// Inclure le fichier de connexion à la base de données (connexion.php)
include("../controllers/connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_apprenant = $_POST["idapprenant"];
    $nouveau_nom = $_POST["nomapprenant"];
    $nouveau_prenom = $_POST["prenomapprenant"];
    $nouveau_email = $_POST["email"];
    $phone = $_POST["phone"];
    $dateNaiss = $_POST["dateNaiss"];
    $filiere = $_POST["Filière"];
    $niveau = $_POST["Niveau"];
    $hobbie = $_POST["hobbie"];
    $sexe = $_POST["sexe"];
    $photo = $_FILES["img"]["name"];
    $upload = "../assets/dist/picture/".$photo;

    move_uploaded_file($_FILES["img"]["tmp_name"], $upload);

    // Requête SQL préparée pour mettre à jour les données de l'apprenant
    $sql = "UPDATE apprenants 
            SET prenomapprenant = :nouveau_prenom, 
                nomapprenant = :nouveau_nom, 
                email = :nouveau_email, 
                phone = :phone, 
                dateNaiss = :dateNaiss, 
                Filière = :filiere, 
                Niveau = :niveau, 
                hobbie = :hobbie, 
                sexe = :sexe,
                photo = :photo 
            WHERE idapprenant = :id_apprenant";

    // Préparation de la requête
    $query = $connexion->prepare($sql);

    // Liaison des valeurs
    $query->bindParam(':nouveau_prenom', $nouveau_prenom, PDO::PARAM_STR);
    $query->bindParam(':nouveau_nom', $nouveau_nom, PDO::PARAM_STR);
    $query->bindParam(':id_apprenant', $id_apprenant, PDO::PARAM_INT);
    $query->bindParam(':nouveau_email', $nouveau_email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':dateNaiss', $dateNaiss, PDO::PARAM_STR);
    $query->bindParam(':filiere', $filiere, PDO::PARAM_STR);
    $query->bindParam(':niveau', $niveau, PDO::PARAM_INT);
    $query->bindParam(':hobbie', $hobbie, PDO::PARAM_STR);
    $query->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $query->bindParam(':photo', $photo, PDO::PARAM_STR);

    if ($query->execute()) {
        echo '<div class="container">';
        echo '<div class="alert alert-success" role="alert">';
        echo "Données de l'apprenant mises à jour avec succès";
        echo "</div>";
        header("Location: listeApprenant.php");
        echo "</div>";
    } else {
        echo "Erreur lors de la mise à jour de l'apprenant : " . $query->errorInfo()[2];
    }
}
?>
