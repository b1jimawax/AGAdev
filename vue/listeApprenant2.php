<?php
require_once('../Controllers/verifi.php')
?>
<!DOCTYPE html>
<html>
<?php
include("../Controllers/connexion.php");
include("../Controllers/read.php");

if ($resultat->rowCount() > 0) {
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Liste des Apprenants</title>

    <style>
        .img-thumbnail {
            transition: transform 0.3s ease-in-out;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body style="
    font-size: 110%;
">
    <div class="container mt-5">

        <div class="conte" style="display:flex;justify-content: space-between;align-items: center;">
            <img src="../assets/dist/picture/agadev1.png" width=100 height=100 class="img-fluid" alt="hero">
            <h2 class="text-center">Bienvenue Admin</h2>
        </div>

        <!-- champ de recherche -->
        <div class="form-group">
            <label for="searchInput">Rechercher un apprenant par nom :</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Entrez le nom de l'apprenant">
        </div>

        <table class="table table-striped table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse mail</th>
            <th style="
    padding-right: 60px;
">Phone</th>
            <th style="
    width: 90px;
">Date de Naiss</th>
            <th>Filière</th>
            <th>Niveau</th>
            <th>Hobbie</th>
            <th>Sexe</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['idapprenant']; ?></td>
                <td>
                    <img class="img-thumbnail" src="../assets/dist/picture/<?php echo $row['photo']; ?>" alt="Photo de l'apprenant" style="max-width: 50px;">
                </td>
                <td><b><?php echo $row['nomapprenant']; ?></b></td>
                <td><?php echo $row['prenomapprenant']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['dateNaiss']; ?></td>
                <td><?php echo $row['Filière']; ?></td>
                <td><?php echo $row['Niveau']; ?></td>
                <td><?php echo $row['hobbie']; ?></td>
                <td><?php echo $row['sexe']; ?></td>
                
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    <?php
} else {
    echo "Aucun apprenant enregistré dans la base de données.";
}

$connexion = null;
?>

    </div>

    <div class="container text-right">
        <h2><a class="btn btn-secondary" href="../Controllers/deconnexion.php"><i class="glyphicon glyphicon-share"></i>  Déconnexion</a></h2>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        // Filtrer les résultats du tableau en fonction de la saisie de l'utilisateur
        $(document).ready(function () {
            $('#searchInput').on('input', function () {
                var searchValue = $(this).val().toLowerCase();
                $('tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
                });
            });
        });
    </script>
</body>

</html>
