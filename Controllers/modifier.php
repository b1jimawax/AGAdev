<?php
require_once('../controllers/verifi.php')
 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dist/css/style.css">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min">
    <title>Modifier apprenant</title>
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
            max-width: 800px;
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

        include("connexion.php");

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
            <h2>Modifier les informations de <?php echo htmlspecialchars($row["nomapprenant"]); ?> </h2>
            <form method="post" action="../vue/modifier0.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <input type="hidden" name="idapprenant" value="<?php echo htmlspecialchars($row["idapprenant"]); ?>">
            <input type="text" class="form-control" name="nomapprenant" value="<?php echo htmlspecialchars($row["nomapprenant"]); ?>" required>
            <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($row["email"]); ?>" required>
            <input type="text" class="form-control" name="prenomapprenant" value="<?php echo htmlspecialchars($row["prenomapprenant"]); ?>" required>
            <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($row["phone"]); ?>" required>
            <input type="file" class="form-control" name="img" value="<?php echo htmlspecialchars($row["photo"]); ?>" >
            
        </div>
        <div class="col">
        <input type="text" class="form-control" name="dateNaiss" value="<?php echo htmlspecialchars($row["dateNaiss"]); ?>" required>
        <select class="form-control" name="Filière" required>
                <option value="frontend" <?php echo ($row["Filière"] == "front-end") ? "selected" : ""; ?>>Front-end</option>
                <option value="backend" <?php echo ($row["Filière"] == "back-end") ? "selected" : ""; ?>>Back-end</option>
                <option value="fullstack" <?php echo ($row["Filière"] == "fullstack") ? "selected" : ""; ?>>Fullstack</option>
            </select>
            <input type="number" class="form-control" name="Niveau" value="<?php echo htmlspecialchars($row["Niveau"]); ?>" required>
            <input type="text" class="form-control" name="hobbie" value="<?php echo htmlspecialchars($row["hobbie"]); ?>" required>
            <select class="form-control" name="sexe" required>
                <option value="F" <?php echo ($row["sexe"] == "F") ? "selected" : ""; ?>>Femme</option>
                <option value="H" <?php echo ($row["sexe"] == "H") ? "selected" : ""; ?>>Homme</option>
            </select>
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Modifier" style="margin-top:10px;">
</form>
    <div class="container text-right">
        <h2><a class="btn btn-secondary" href="../vue/listeApprenant.php"><i class="glyphicon glyphicon-share"></i> Retourner</a></h2>
    </div>

        <?php
        } else {
            echo "Erreur lors de la récupération des données de l'apprenant.";
        }
        ?>
    </div>
</body>

</div>

</html>
