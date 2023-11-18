<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenomapprenant"];
    $nom = $_POST["nomapprenant"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Inclure le fichier de connexion à la base de données (connexion.php)
    include("connexion.php");

    // Requête SQL pour insérer l'apprenant dans la base de données
    $sql = "INSERT INTO apprenants (prenomapprenant, nomapprenant, email) VALUES (?, ?, ?, ?)";
    
    // Préparation de la requête
    $stmt = $connexion->prepare($sql);
    
    // Exécution de la requête en liant les paramètres
    if ($stmt->execute([$prenom, $nom, $email])) {
        echo "Apprenant enregistré avec succès dans la base de données";
        header("Location: listeApprenant.php");
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur lors de l'ajout de l'apprenant : " . $errorInfo[2];
    }

    // Fermer la connexion à la base de données
    $connexion = null;
}

?>
