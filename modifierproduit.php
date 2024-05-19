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

if (isset($_GET["id"])) {
    if (!VerifierId($bd, $_GET["id"])) {
        header("Location: modifierproduit.php");
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "modifier") {
        if (isset($_GET["id"])) {
            ModifierProduit($bd, $_GET["id"], $_POST["nomProduit"], $_POST["prixProduit"], $_POST["fournisseur"], $_POST["quantite"], $_POST["format"], $_POST["description"]);
            header("Location: modifierproduit.php");
        }
    }
}

require ('inclus/entete2.inc');
?>
<h2 class="text-center">Modifier un produit</h2>
<div>
    <?php if (isset($_GET["id"])) {
        AfficherFormModif($bd, $_GET["id"]);
    } else {
        AfficherProduitMod($bd);
    }
    ?>
</div>

<?php require ('inclus/piedPage2.inc'); ?>

