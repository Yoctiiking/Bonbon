<?php 
    require('librairie/fonction.lib.php');
    require('inclus/entete.inc'); 
    
    $bd;
    ConnecterBD($bd);
    AfficherProduit($bd);
?>



<?php require('inclus/piedPage.inc'); ?>