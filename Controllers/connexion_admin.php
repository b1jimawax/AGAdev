<?php
//catte fonction permet d'ouvrir un session dans l'application
session_start();

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];

    $sql = "SELECT * FROM user WHERE nom = :nom AND pwd = :pwd";
    $query = $connexion->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() == 1) {
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur['role'] == 'read_write') {
            session_start();
            $_SESSION['nom_utilisateur'] = $nom;
            $_SESSION['role'] = 'read_write';
            $_SESSION["admin_logged_in"] = true;
            header("Location: ../vue/listeApprenant.php?role=read_write");
        } elseif ($utilisateur['role'] == 'read_only') {
            session_start();
            $_SESSION['nom_utilisateur'] = $nom;
            $_SESSION['role'] = 'read_only';
            $_SESSION["admin_logged_in"] = true;
            header("Location: ../vue/listeApprenant2.php?role=read_only");
        } else{
            echo "Vous n'avez pas les droits appropriés pour accéder à cette ressource.";
        }
    }
}
?>

