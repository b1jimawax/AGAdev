<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <title>Modifier un apprenant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
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

        // Récupérer l'ID de l'apprenant depuis l'URL
        $idapprenant = $_GET["id"];

        // Requête SQL pour récupérer les données actuelles de l'apprenant en fonction de son ID
        $sql = "SELECT * FROM apprenants WHERE idapprenant = :idapprenant";
        $query = $connexion->prepare($sql);
        $query->bindParam(':idapprenant', $idapprenant, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() == 1) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
        ?>
            <h2>Modifier un apprenant</h2>
            <form method="post" action="modifier0.php">
                <input type="hidden" name="idapprenant" value="<?php echo htmlspecialchars($row["idapprenant"]); ?>">
                <div class="form-group">
                    <label for="nom">Nouveau nom :</label>
                    <input type="text" class="form-control" name="nomapprenant" value="<?php echo htmlspecialchars($row["nomapprenant"]); ?>">
                </div>
                <div class="form-group">
                    <label for="prenom">Nouveau prénom :</label>
                    <input type="text" class="form-control" name="prenomapprenant" value="<?php echo htmlspecialchars($row["prenomapprenant"]); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Nouveau email :</label>
                    <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($row["email"]); ?>">
                </div>
                <input type="submit" class="btn btn-primary" value="Modifier">
            </form>
        <?php
        } else {
            echo "Erreur lors de la récupération des données de l'apprenant.";
        }
        ?>
    </div>
</body>

</html>
