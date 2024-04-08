<?php session_start();
if($_SESSION["acces"] != "Oui"){
    header("Location: index.php");
}

require('./inclus/entete2.inc');
?>
<h2 class="text-center">Ajouter un produit</h2>
<div class="text-center">
<<- EN CONSTRUCTION ->>
</div>

<?php require('./inclus/piedPage2.inc'); ?>