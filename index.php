<?php
session_start();
?>

<html>
<?php
include("Controllers/connexion.php");
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
            padding-top: 100px;
            overflow: hidden;
            transition: background-color 1s ease; /* Transition de couleur de fond */
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

        img {
            position: absolute;
            width: 200px;
            height: 100px;
            animation: bounce 1s infinite, zoom 1s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes zoom {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }
    </style>
</head>

<body>
    <h2 style="color:white;">AUTHENTIFICATION</h2><br>
    <form action="Controllers/connexion_admin.php" method="post">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script>
        // JavaScript pour changer la couleur de fond progressivement toutes les 3 secondes
        function changeBackgroundColor() {
            var colors = ["#1abc9c", "#3498db", "#9b59b6", "#e74c3c", "#f39c12"]; // Ajoutez les couleurs que vous souhaitez

            TweenMax.to("body", 3, {
                backgroundColor: colors[Math.floor(Math.random() * colors.length)],
                onComplete: function() {
                    setTimeout(changeBackgroundColor, 1000);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            changeBackgroundColor();
        });
    </script>
</body>
</html>
