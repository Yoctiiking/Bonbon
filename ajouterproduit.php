<?php session_start();
if ($_SESSION["acces"] != "Oui") {
    header("Location: index.php");
}
require ('./librairie/fonction.lib.php');
$bd;
ConnecterBD($bd);
if(isset($_GET["action"])){
    if($_GET["action"] == "ajouter"){
        AjouterProduit($bd, $_POST["nomProduit"], $_POST["fournisseur"], $_POST["quantite"], $_POST["format"], $_POST["prixProduit"], $_POST["description"]);
    }
}
require ('./inclus/entete2.inc');
?>

<h2 class="text-center">Ajouter un produit</h2>

<form action="ajouterproduit.php?action=ajouter" enctype="multipart/form-data" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Nom du produit :
        </span>
        <input type="text" class="form-control" name="nomProduit" id="nomProduit" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Prix :
        </span>
        <input type="number" class="form-control" name="prixProduit" id="prixProduit" value="0" min="0" step="0.01" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Fournisseur :
        </span>
        <input type="text" class="form-control" name="fournisseur" id="fournisseur">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Quantite :</span>
        <input type="number" class="form-control" name="quantite" id="quantite" value="0" min="0" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Format :
        </span>
        <input type="text" class="form-control" name="format" id="format">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bonbonBg text-light">Description :
        </span>
        <input type="text" class="form-control" name="description" id="description">
    </div>
    <div class="mb-3">
        <input class="form-control" type="file" id="imageProduit" name="imageProduit">
    </div>
    <div class="mt-4 mb-3">
        <input type="submit" value="Sauvegarder">
        <input type="reset" value="Annuler">
    </div>
</form>

<?php require ('./inclus/piedPage2.inc'); ?>

