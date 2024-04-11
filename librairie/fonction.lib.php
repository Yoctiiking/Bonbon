<?php

function ConnecterBD(&$bd)
{
    $bd = mysqli_connect("localhost", "root", "infoWin420", "bonbon");
    if (mysqli_connect_errno()) {
        echo "Echec de la connexion à mysql : " . mysqli_connect_error();
    }
    $bd->set_charset("utf8");
}

function AfficherProduit($bd)
{
    $requete = "select * from produit";
    $resultat = mysqli_query($bd, $requete);
    while ($ligne = mysqli_fetch_array($resultat)) {
        print ("<div class = 'row mb-4' >");
        print ("<h3>$ligne[nomProduit]</h3>");
        print ("<div class ='col-md-5 col-lg-4 col-xl-3 col' >");
        print ("<img class = '' src ='images/$ligne[idProduit].jpg' height = '200' width = '250'>");
        print ("</div>");
        print ("<div class ='col-md-7 col' style = 'text-align: start;'>");
        print ("<strong>Prix : </strong>$ligne[prix] \$CA <br/>");
        print ("<strong>Disponibilité : </strong>$ligne[quantite] <br/>");
        print ("<strong>Format : </strong>$ligne[format] <br/>");
        print ("<strong>Fournisseur : </strong>$ligne[fournisseur] <br/>");
        print ("<strong>Remarque : </strong>$ligne[description] <br/>");
        print ("</div>");
        print ("</div>");
        print ("<hr/>");
    }
}

function VerifierUsager($bd, $courriel, $mdp)
{
    $requete = "SELECT * FROM usager WHERE courriel = '$courriel' AND motPasse = '$mdp'";
    $resultat = mysqli_query($bd, $requete);
    if (mysqli_num_rows($resultat) == 1) {
        return true;
    } else {
        return false;
    }
}

function AjouterProduit($bd, $nomProduit, $fournisseur, $quantite, $format, $prixProduit, $description)
{
    $nomProduit = ucfirst($nomProduit);
    $fournisseur = ucfirst($fournisseur);
    $requete = "INSERT INTO produit (nomProduit, fournisseur, quantite, format, prix, description) VALUES ('$nomProduit', '$fournisseur', '$quantite', '$format', '$prixProduit', '$description')";
    mysqli_query($bd, $requete);
    $number = mysqli_insert_id($bd);
    $fichier = $_FILES["imageProduit"]["tmp_name"];
    move_uploaded_file($fichier, "images/$number.jpg");
}

function SupprimerProduit($bd)
{
    $requete = "select * from produit";
    $resultat = mysqli_query($bd, $requete);
    while ($ligne = mysqli_fetch_array($resultat)) {
        $cocher = 'chk' . $ligne['idProduit'];
        if (isset($_POST[$cocher])) {
            if ($_POST[$cocher]) {
                $requete2 = "delete from produit where idProduit = $ligne[idProduit]";
                $resultat2 = mysqli_query($bd, $requete2);
                unlink("images/$ligne[idProduit].jpg");
            }
        }
    }
}

?>

