<?php session_start();
if (isset($_SESSION["acces"])) {
    if ($_SESSION["acces"] != "Oui") {
        header("Location: index.php");
    }
} else {
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

<form action="supprimerproduit.php?action=supprimer" method="post" class="mt-3">

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>&nbsp</th>
                <th>Nom</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Format</th>
                <th>Description</th>
            </tr>
            <?php afficherEnregistrement($bd); ?>
        </table>
    </div>
    <br>
    <div class="text-center">
        <input type="submit" value="Supprimer" onclick="return ValiderSuppression();">
        <input type="reset" value="Annuler">
    </div>
</form>

<?php require ('inclus/piedPage2.inc'); ?>

