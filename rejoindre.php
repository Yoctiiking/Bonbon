<?php require('./inclus/entete.inc'); ?>

<form action="" method="post">
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
        <div class="col-md-1 col-lg-3 col">&nbsp;</div>
        <div class="col-md-9 col mt-1">
            <textarea name="message" id="message" cols="75" rows="20" placeholder="Inscrire votre message"></textarea>
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
        <div class="col-md-8 "><input type="checkbox" name="accepte" id="accepte"> Je veux recevoir une copie de ce message.</div>
    </div>-
</form>

<?php require('./inclus/piedpage.inc'); ?>