
<?php
    $sql = "SELECT idapprenant, nomapprenant, prenomapprenant, email, photo, phone, dateNaiss, Filière, Niveau, hobbie, sexe
    FROM apprenants";
    $resultat = $connexion->query($sql);
?>
