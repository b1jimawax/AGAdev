<?php
// Inclure le fichier de connexion à la base de données (connexion.php)
include("connexion.php"); // Assurez-vous d'avoir un fichier de connexion approprié.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];

    // Vérifier l'authentification de l'utilisateur
    $sql = "SELECT * FROM user WHERE nom = :nom AND pwd = :pwd";
    $query = $connexion->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $query->execute();

    // Vérifier si des résultats ont été retournés
    if ($query->rowCount() == 1) {
        // Authentification réussie
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur['role'] == 'read_write') {
            // Rediriger vers la page d'accès read_write
            header("Location: ../vue/listeApprenant.php");
        } elseif ($utilisateur['role'] == 'read_only') {
            // Rediriger vers la page d'accès read_only
            header("Location: ../vue/listeApprenant2.php");
        } else {
            // Cas où le rôle n'est ni read_write ni read_only
            echo "Vous n'avez pas les droits appropriés pour accéder à cette ressource.";
        }
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
