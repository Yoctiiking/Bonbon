<?php

function formatterTexte($texte)
{
    $newString = str_replace("'", "&apos;", $texte);
    return $newString;
}
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
        print ("<div class = 'row mb-4 position-relative'>");
        print ("<h3>$ligne[nomProduit]</h3>");
        print ("<div class ='col-md-5 col-lg-4 col-xl-3 col position-relative' >");
        print ("<img class = 'img-fluid img-bd' src ='images/$ligne[idProduit].jpg'>");
        print ("</div>");
        print ("<div class ='col-md-6 col position-relative' style = 'text-align: start;'>");
        print ("<div class ='position-relative top-50 start-50 translate-middle'>");
        print ("<strong>Prix : </strong>$ligne[prix] \$CA <br/>");
        print ("<strong>Disponibilité : </strong>$ligne[quantite] <br/>");
        print ("<strong>Format : </strong>$ligne[format] <br/>");
        print ("<strong>Fournisseur : </strong>$ligne[fournisseur] <br/>");
        print ("<strong>Remarque : </strong>$ligne[description] <br/>");
        print ("</div>");
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
    $nomProduit = formatterTexte(ucfirst($nomProduit));
    $fournisseur = formatterTexte(ucfirst($fournisseur));
    $description = formatterTexte(ucfirst($description));
    $requete = "INSERT INTO produit (nomProduit, fournisseur, quantite, format, prix, description) VALUES ('$nomProduit', '$fournisseur', '$quantite', '$format', '$prixProduit', '$description')";
    mysqli_query($bd, $requete);
    $number = mysqli_insert_id($bd);
    $fichier = $_FILES["imageProduit"]["tmp_name"];
    move_uploaded_file($fichier, "images/$number.jpg");
}

function afficherEnregistrement($bd)
{
    $requete = "select * from produit";
    $resultat = mysqli_query($bd, $requete);

    while ($ligne = mysqli_fetch_array($resultat)) {
        print ('<tr>');
        print ("<td><input type='checkbox' name='chk$ligne[idProduit]'></td>");
        print ("<td>$ligne[nomProduit]</td>");
        print ("<td>$ligne[fournisseur]</td>");
        print ("<td class='text-center'>$ligne[quantite]</td>");
        print ("<td>$ligne[prix]</td>");
        print ("<td>$ligne[format]</td>");
        print ("<td>$ligne[description]</td>");
    }
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
                if (file_exists("images/$ligne[idProduit].jpg")) {
                    unlink("images/$ligne[idProduit].jpg");
                }
            }
        }
    }
}

function AfficherProduitMod($bd)
{
    $requete = "select * from produit";
    $resultat = mysqli_query($bd, $requete);

    $noId = -1;
    if (isset($_GET["id"])) {
        $noId = $_GET["id"];
    }
    while ($ligne = mysqli_fetch_array($resultat)) {
        if ($ligne['idProduit'] == $noId) {

        } else {

            print ("<div class = 'row mb-4 position-relative'>");
            print ("<h3>$ligne[nomProduit]</h3>");
            print ("<div class ='col-md-5 col-lg-4 col-xl-3 col position-relative' >");
            print ("<img class = 'img-fluid img-bd' src ='images/$ligne[idProduit].jpg'>");
            print ("</div>");
            print ("<div class ='col-md-6 col position-relative' style = 'text-align: start;'>");
            print ("<div class ='position-relative top-50 start-50 translate-middle'>");
            print ("<strong>Prix : </strong>$ligne[prix] \$CA <br/>");
            print ("<strong>Disponibilité : </strong>$ligne[quantite] <br/>");
            print ("<strong>Format : </strong>$ligne[format] <br/>");
            print ("<strong>Fournisseur : </strong>$ligne[fournisseur] <br/>");
            print ("<strong>Remarque : </strong>$ligne[description] <br/>");
            print ("</div>");
            print ("</div>");
            print ("<div class ='col-md-1 position-relative top-100 translate-middle-x-y mt-4'>");
            print ("<a class='position-absolute top-50 start-50 translate-middle' href='modifierproduit.php?id=$ligne[idProduit]'>Modifier</a>");
            print ("</div>");
            print ("</div>");
            print ("<hr/>");
        }
    }
}

function AfficherFormModif($bd, $noId)
{
    $requete = "select * from produit where idProduit = $noId";
    $resultat = mysqli_query($bd, $requete);
    while ($ligne = mysqli_fetch_array($resultat)) {
        if (mysqli_num_rows($resultat) > 0) {
            print ("
        <form action='modifierproduit.php?action=modifier&id=$noId' method='post'>
        <div class='row position-relative'>
            <div class='col-md-5 col-lg-4 col-xl-3 text-center position-relative'>
                <img src='images/$ligne[idProduit].jpg' class='position-relative top-50 translate-middle-y mb-4' height='200' width='250'>
            </div>
            <div class='col-md-7 col-lg-8 col-xl-9 position-relative'>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Nom du produit :
                    </span>
                    <input type='text' class='form-control' name='nomProduit' id='nomProduit' maxlength='50' value='$ligne[nomProduit]' required>
                </div>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Prix :
                    </span>
                    <input type='number' class='form-control' name='prixProduit' id='prixProduit' min='0' step='0.01' value='$ligne[prix]' required>
                </div>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Fournisseur :
                    </span>
                    <input type='text' class='form-control' name='fournisseur' maxlength='50' id='fournisseur' value='$ligne[fournisseur]'>
                </div>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Quantite :</span>
                    <input type='number' class='form-control' name='quantite' id='quantite' min='0' value='$ligne[quantite]' required>
                </div>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Format :
                    </span>
                    <input type='text' class='form-control' name='format' id='format' maxlength='25' value='$ligne[format]'>
                </div>
                <div class='input-group mb-3'>
                    <span class='input-group-text bonbonBg text-light'>Description :
                    </span>
                    <input type='text' class='form-control' name='description' id='description' maxlength='100' value='$ligne[description]'>
                </div>
            </div>
        </div>
        <div class='mt-4 mb-3 text-center position-relative'>
            <input type='submit' value='Sauvegarder'>
            <input type='button' onclick='AnnulerModif();' value='Annuler'>
        </div>
        </form>
        ");
        }
    }
}

function ModifierProduit($bd, $id, $nom, $prix, $fournisseur, $quantite, $format, $description)
{
    $nom = formatterTexte(ucfirst($nom));
    $fournisseur = formatterTexte(ucfirst($fournisseur));
    $description = formatterTexte(ucfirst($description));
    $requete = "update produit set nomProduit = '$nom', prix = $prix, fournisseur = '$fournisseur', quantite = $quantite, format = '$format', description = '$description' where idProduit = $id";
    $resultat = mysqli_query($bd, $requete);
}

function VerifierId($bd, $id)
{
    $requete = "select * from produit where idProduit = $id";
    $resultat = mysqli_query($bd, $requete);
    if (mysqli_num_rows($resultat) == 1) {
        return true;
    } else {
        return false;
    }
}

function EnvoyerMessage($courriel, $nom, $sujet, $message, $mail = "nancy.bluteau@collegealma.ca")
{
    $objet = iconv('utf-8', 'ISO-8859-1', "Message du site www.bonbon.com");
    $from = "From:".$courriel."\r\n";

    $texte = "Sujet : ".$sujet;
    $texte .= "\r\nLe message vient de : ".$nom;
    $texte .= "\r\n\r\n".$message;
    

    $texte = iconv('utf-8', 'ISO-8859-1', $texte);
    $texte = wordwrap($texte, 120, "\r\n", true);

    mail($mail, $objet, $texte, $from);
}

?>
