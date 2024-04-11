<?php session_start();
if(isset($_SESSION["acces"])){
    if ($_SESSION["acces"] != "Oui") {
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
require('./inclus/entete2.inc');
?>
<h2 class="text-center">Modifier un produit</h2>
<div class="text-center">
<<- EN CONSTRUCTION ->>
</div>

<?php require('./inclus/piedPage2.inc'); ?>