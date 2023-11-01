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
            max-width: 300px;
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
        <label for="nomapprenant">Nom de l'apprenant:</label>
        <input type="text" name="nomapprenant" required>

        <label for="prenomapprenant">Prénom de l'apprenant:</label>
        <input type="text" name="prenomapprenant" required>

        <label for="email">Adresse email:</label>
        <input type="text" name="email" required>

        <label for="img">Photo de l'apprenant:</label>
        <input type="file" name="img" required>

        <input type="submit" name="btnAjout" value="Ajouter l'apprenant">
    </form>
</body>
</html>
