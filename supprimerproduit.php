<?php session_start();
if(isset($_SESSION["acces"])){
    if ($_SESSION["acces"] != "Oui") {
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
require ('librairie/fonction.lib.php');

$bd;
ConnecterBD($bd);

if (isset($_GET["action"])) {
    if ($_GET["action"] == "supprimer") {
        SupprimerProduit($bd);
    }
}

require ('inclus/entete2.inc');
?>
<h2 class="text-center">Supprimer un produit</h2>

<form
    action="supprimerproduit.php?action=supprimer" method="post" class="mt-3">
    <?php
    $requete = "select * from produit";
    $resultat = mysqli_query($bd, $requete);

    print ('<table class="table table-bordered">
    <tr>
        <th>&nbsp</th>
        <th>Nom</th>
        <th>Fournisseur</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Format</th>
        <th>Description</th>
    </tr>
    ');
    while ($ligne = mysqli_fetch_array($resultat)) {
        print ('<tr>');
        print ("<td><input type='checkbox' name='chk$ligne[idProduit]'></td>");
        print ("<td>$ligne[nomProduit]</td>");
        print ("<td>$ligne[fournisseur]</td>");
        print ("<td>$ligne[quantite]</td>");
        print ("<td>$ligne[prix]</td>");
        print ("<td>$ligne[format]</td>");
        print ("<td>$ligne[description]</td>");
    }
    print ('</table>');
    ?>
    <br>
    <div class="text-center">
        <input type="submit" value="Supprimer" onclick="return ValiderSuppression();">
        <input type="reset" value="Annuler">
    </div>
</form>

<script type="text/javascript">
    function ValiderSuppression() {
var valide = false;
if (confirm('Voulez-vous supprimer ce ou ces produits ?')) {
valide = true;
}
return valide;
}
</script>

<?php require ('inclus/piedPage2.inc'); ?>

