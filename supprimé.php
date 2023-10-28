<?php
// Inclure le fichier de connexion à la base de données (connexion.php)
include("connexion.php"); // Assurez-vous d'avoir un fichier de connexion approprié.

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idapprenant = $_GET['id'];

    // Requête SQL pour supprimer l'apprenant
    $sql = "DELETE FROM apprenants WHERE idapprenant = :idapprenant"; // Correction du nom du paramètre
    $query = $connexion->prepare($sql);
    $query->bindParam(':idapprenant', $idapprenant, PDO::PARAM_INT);

    if ($query->execute()) {
        // Rediriger l'utilisateur vers la page de liste des apprenants après la suppression
        header("Location: listeApprenant.php");
        exit; // Arrêter le script après la redirection
    } else {
        // En cas d'échec de la suppression
        echo "Erreur lors de la suppression de l'apprenant.";
    }
}
?>
