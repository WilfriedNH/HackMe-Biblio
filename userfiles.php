<?php

require_once 'inc/loader.php';
rejectNotAdmin();
$documents = glob(realpath(dirname(__FILE__)) . '/user/uploads/' . uid() . '/*.pdf');
_a($documents);
$d = 0;
?>
<div class="well">
    <h3>Vos documents PDF</h3><hr />
    <div class="row">
        <?php foreach ($documents as $document): ++$d; ?>
            <div class="span2" style="text-align: center; padding-bottom: 20px;"><a href="userfile.php?file=<?php echo urlencode(_p(basename($document))); ?>"><img src="img/ext/pdf_128.png" width="64" /><br /><?php echo _p(substr(basename($document), 0, 20)); ?></a></div>
        <?php endforeach; ?>
        <?php if (!$d) echo '<div class="span12"><p>Vous n\'avez aucun document pour le moment. <a href="profile.php">[ Retour au compte utilisateur ]</a></p></div>'; ?>
    </div>
</div>
<?php
template();