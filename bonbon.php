<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M. Bonbon</title>
</head>

<body>
    <?php
    $bd = mysqli_connect("localhost", "root", "infoWin420", "bonbon");
    if (mysqli_connect_errno()) {
        echo "Echec de la connexion à mysql : " . mysqli_connect_error();
    }
    mysqli_set_charset($bd, "utf8");
    $requete = "select * from usager";
    $resultat = mysqli_query($bd, $requete);
    while ($ligne = mysqli_fetch_array($resultat)) {
        print("<p>");
        print("<h3>No. Usager: $ligne[idUsager]</h3>");
        print("$ligne[prenom]&nbsp;$ligne[nom]<br>");
        print("$ligne[courriel]<br>");
        print("</p>");
    }
    ?>
</body>

</html>