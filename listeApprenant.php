<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <title>Liste des Apprenants</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Liste des Apprenants</h2>
        <a class="btn btn-success d-block mx-auto my-4" href="ajoute.php"><i class="glyphicon glyphicon-user"></i>   Ajouter un apprenant</a>
        <?php
include("connexion.php");
$sql = "SELECT idapprenant, nomapprenant, prenomapprenant, email, photo FROM apprenants";
$resultat = $connexion->query($sql);

if ($resultat->rowCount() > 0) {
?>
    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse mail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['idapprenant']; ?></td>
                    <td><img class="img-thumbnail" src="picture/<?php echo $row['photo']; ?>" alt="Photo de l'apprenant" style="max-width: 50px;"></td>
                    <td><?php echo $row['nomapprenant']; ?></td>
                    <td><?php echo $row['prenomapprenant']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a class="btn btn-outline-primary" href="modifier.php?id=<?php echo $row['idapprenant']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                        <a class="btn btn-outline-danger" href="supprimé.php?id=<?php echo $row['idapprenant']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
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

    <div class="container text-center">
        <h2><a class="btn btn-secondary" href="index.php"><i class="glyphicon glyphicon-share"></i>  Déconnexion</a></h2>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
