<?php session_start();
require ('librairie/fonction.lib.php');
$bd;
ConnecterBD($bd);

$valide = true;
if (isset($_GET["action"])) {
    if ($_GET["action"] == "connecter") {
        $valide = VerifierUsager($bd, $_POST["courriel"], $_POST["mdp"]);
        if ($valide) {
            $_SESSION["acces"] = "Oui";
            $_SESSION["courriel"] = $_POST["courriel"];
            header("Location: ajouterproduit.php");
        }
    }
}
require ('inclus/entete.inc');

?>

<form action="connexion.php?action=connecter" method="post">
    <div class="row">
        <div class="col-5 text-end">Courriel :</div>
        <div class="col-7"><input type="email" name="courriel" id="courriel" required></div>
    </div>
    <div class="row">
        <div class="col-5 text-end">Mot de passe :</div>
        <div class="col-7"><input type="password" name="mdp" id="mdp" required></div>
    </div>
    <div class="row align-center mt-2">
        <div class="col-6 text-end">
            <input type="submit" value="Se connecter">
        </div>
        <div class="col-6 text-start">
            <input type="reset" value="Annuler">
        </div>
    </div>
    <?php if (!$valide) {
        print ('<div class="text-center text-danger mt-4"> >> Le courriel ou le mot de passe est invalide << </div>');
    } ?>
</form>

<?php require ('inclus/piedPage.inc'); ?>
