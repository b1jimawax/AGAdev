<?php
    $sql = "SELECT idapprenant, nomapprenant, prenomapprenant, email, photo, phone, dateNaiss, Filière, Niveau, hobbie, sexe
    FROM apprenants ORDER BY  idapprenant DESC";
    $resultat = $connexion->query($sql);
?>
