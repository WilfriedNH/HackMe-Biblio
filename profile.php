<?php

require_once 'inc/loader.php';
rejectNotUser();
?>
<h2>Compte <?php echo isAdmin() ? 'administrateur' : 'utilisateur'; ?></h2><hr />
<div class="row">
    <div class="span<?php echo isAdmin() ? 4 : 6; ?>">
        <div class="well" style="position: relative; height: 150px;">
            <h4>Documents</h4><hr />
            <img src="img/ext/pdf_128.png" width="64" style="position: absolute; bottom: -15px; right: -15px;" />
            <form action="documents.php" method="post">
                <select name="p">
                    <option value="events">Evénements du mois prochain</option>
                    <option value="cgu">Conditions générales d'utilisation</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Consulter" />
            </form>
        </div>
    </div>
    <div class="span<?php echo isAdmin() ? 4 : 6; ?>">
        <div class="well" style="position: relative; height: 150px;">
            <h4>Emprunts</h4><hr />
            <img src="img/book_128.png" width="64" style="position: absolute; bottom: -15px; right: -15px;" />
            <p>Vous n'avez aucun emprunt en cours</p>
            <p><a href="books.php">Consulter la liste des livres</a></p>
        </div>
    </div>
    <?php if (isAdmin()): ?>
        <div class="span4">
            <div class="well" style="position: relative; height: 150px;">
                <h4>Vos fichiers PDF</h4><hr />
                <img src="img/cloud_64.png" width="64" style="position: absolute; bottom: -15px; right: -15px;" />
                <p>
                    <?php
                    $nb_files = glob(realpath(dirname(__FILE__)) . '/user/uploads/' . uid() . '/*');
                    $nb_files = $nb_files ? count($nb_files) : 0;
                    $plural = $nb_files > 1 ? 's' : '';
                    echo $nb_files ? '<a href="userfiles.php">Vous avez ' . $nb_files . ' fichier' . $plural . ' PDF</a>' : 'Vous n\'avez aucun fichier PDF';
                    ?>
                </p>
                <form class="form-inline" enctype="multipart/form-data" action="upload.php" method="post">
                    <input type="file" name="file" accept="application/pdf" /><input type="submit" value="Envoyer" class="btn btn-primary" />
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
template();