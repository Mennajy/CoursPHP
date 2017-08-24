<h1>Création d'une adresse</h1>

<?php
if (isset($resultats['ok']) && $resultats['ok']):
    ?>
    <div class="alert alert-success">
        Adresse sauvegardée avec succès.
    </div>
    <?php
endif;
?>
<form action="<?= HtmlHelper::url('addresses', 'add') ?>"
      method="POST">
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" class="form-control"><br>
    </div>
    <div class="form-group">
        <label for="cp">CP :</label>
        <input type="text" name="cp" id="cp" class="form-control"><br>
    </div>
    <div class="form-group">
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" class="form-control"><br>
    </div>
    <button type="submit">Envoyer</button>
</form>