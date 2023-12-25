<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php
include("../Controllers/uplead_image.php");
?>    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min">
    <title>Ajouter un apprenant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            text-align: center;
            margin-top: 100px;
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        form {
            text-align: left;
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
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
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
    <h2>Ajouter un apprenant</h2>
    <form method="post" action="../controllers/uplead_image.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <!-- <input type="hidden" name="idapprenant" > -->
            <input type="text" class="form-control"  placeholder="Nom apprenant" name="nomapprenant" required>
            <input type="text" class="form-control" placeholder="Prenom apprenant" name="prenomapprenant" required>
            <input type="text" class="form-control" placeholder="Adresse email" name="email" required>
            <input type="text" class="form-control" placeholder="+241 00 000 000" name="phone" required>
            <input type="file" class="form-control" placeholder="Photo de profil" name="img">
            
        </div>
        <div class="col">
        <input type="date" class="form-control" placeholder="Date de naissance" name="dateNaiss" required>
        <select class="form-control" placeholder="Choix de filière" name="Filière" required>
                <option value="front-end">Front-end</option>
                <option value="back-end">Back-end</option>  
                <option value="fullstack">Fullstack</option>
            </select>
            <input type="number" class="form-control" placeholder="Niveau apprenant" name="Niveau" required>
            <input type="text" class="form-control" placeholder="Hobbie" name="hobbie" required>
            <select class="form-control" placeholder="Choix du sexe" name="sexe" required>
                <option value="F">Femme</option>
                <option value="H">Homme</option>
            </select>
        </div>
    </div>
    <br>
    <input type="submit" name="btnAjout" class="btn btn-primary" value="Ajouter un apprenant" style="margin-top:10px;">
</form><br>
<div class="container text-right">
        <h2><a class="btn btn-secondary" href="../vue/listeApprenant.php"><i class="glyphicon glyphicon-share"></i> Retouner</a></h2>
    </div>
</body>
</html>
