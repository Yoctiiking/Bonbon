<?php require ('inclus/entete.inc');
require ('librairie/fonction.lib.php');

if (isset($_GET["action"])) {
    if ($_GET["action"] == "envoyer") {
        EnvoyerMessage($_POST["courriel"], $_POST["nom"], $_POST["sujet"], $_POST["message"]);

        if (isset($_POST["accepte"])) {
            if ($_POST["accepte"]) {
                EnvoyerMessage($_POST["courriel"], $_POST["nom"], $_POST["sujet"], $_POST["message"], $_POST["courriel"]);
            }
        }
    }
}
?>


<form action="rejoindre.php?action=envoyer" method="post">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-2">Votre nom :</div>
        <div class="col-md-7"><input type="text" name="nom" id="nom" size="40"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-2">Sujet :</div>
        <div class="col-md-7"><input type="text" name="sujet" id="sujet" size="40"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-2">Courriel :</div>
        <div class="col-md-7"><input type="email" name="courriel" id="courriel" size="40"></div>
    </div>
    <div class="row">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-9 mt-1">
            <textarea class="form-control border border-black" name="message" id="message" cols="75" rows="20" placeholder="Inscrire votre message"></textarea>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6 text-end">
            <input type="submit" value="Envoyer">
        </div>
        <div class="col-6 text-start">
            <input type="reset" value="Annuler">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8 "><input type="checkbox" name="accepte" id="accepte">
            Je veux recevoir une copie de ce message.</div>
    </div>
</form>

<?php require ('inclus/piedPage.inc'); ?>

