<?php
$serveur = "localhost:3306"; // Nom du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$mot_de_passe = ""; // Mot de passe MySQL
$base_de_donnees = "ecole41"; // Nom de la base de données

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
