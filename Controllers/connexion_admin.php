<?php
// Inclure le fichier de connexion à la base de données (connexion.php)
include("connexion.php"); // Assurez-vous d'avoir un fichier de connexion approprié.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];

    // Vérifier l'authentification de l'administrateur
    $sql = "SELECT * FROM admin WHERE nom = :nom AND pwd = :pwd";
    $query = $connexion->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $query->execute();

    // Vérifier si des résultats ont été retournés
    if ($query->rowCount() == 1) {
        // Authentification réussie
        echo "Authentification réussie. Vous êtes connecté en tant qu'administrateur.";
        // Vous pouvez rediriger l'administrateur vers une page d'administration ici.
        header("Location: ../vue/listeApprenant.php"); // Redirige vers la page du tableau de bord 
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
