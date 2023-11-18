<!DOCTYPE html>
<html>
<?php
include("Controllers/connexion.php");
include("Controllers/connexion_admin.php");
?>   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Formulaire de Connexion</title>
    <style>
        body {
            font-family: ;
            /* background-color: #f0f2f5; */
            padding-top: 100px;
        }

        h2 {
            font-size: 24px;
            color: #;
            text-align: center;
        }

        form {
            background-color: #ffffff;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #dcdfe6;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 14px;
            color: #1c1e21;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            background-color: #f7f7f8;
            color: #1c1e21;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #1877f2;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1155cc;
        }

        .pulse {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body style="background-image: url(assets/dist/picture/fabrique.jpg); background-position: center; background-size: cover;">
    <h2 style="color:white;">AUTHENTIFICATION</h2><br>
    <form action="controllers/connexion_admin.php" method="post">
        <div>
            <label for="nom">Nom d'Utilisateur:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="pwd">Mot de Passe:</label>
            <input type="password" id="pwd" name="pwd" required>
        </div><br>
        <div>
            <input type="submit" value="Se Connecter">
        </div>
    </form>
    <div class="container">
    <img src="./assets/dist/picture/agadev1.png" class="pulse" width=200 height=100 alt=""></div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        // JavaScript pour ajouter la classe 'pulse' après le chargement de la page
        document.addEventListener("DOMContentLoaded", function() {
            var img = document.querySelector('.pulse');
            img.classList.add('pulse');
        });
    </script>
</body>
</html>
