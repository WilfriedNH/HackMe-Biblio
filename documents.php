<?php

require_once 'inc/loader.php';
rejectNotUser();
$path = !empty($_POST['p']) ? $_POST['p'] : '';
$dirs = glob(realpath(dirname(__FILE__)) . '/user/documents/' . ($path ? $path . '/' : '') . '*', GLOB_ONLYDIR);
$documents = glob(realpath(dirname(__FILE__)) . '/user/documents/' . ($path ? $path . '/' : '') . '*.pdf');
_a($dirs);
_a($documents);
$d = 0;
?>
<div class="well">
    <h3>Documents</h3><hr />
    <div class="row">
        <?php foreach ($dirs as $dir): ?>
            <div class="span2" style="text-align: center; padding-bottom: 20px;"><img src="img/ext/dir_128.png" width="64" /><br /><?php echo basename($dir); ?></div>
        <?php endforeach; ?>
        <?php foreach ($documents as $document): ++$d; ?>
            <div class="span2" style="text-align: center; padding-bottom: 20px;"><a href="user/documents/<?php echo _p($path) . '/' . basename($document); ?>"><img src="img/ext/pdf_128.png" width="64" /><br /><?php echo basename($document); ?></a></div>
        <?php endforeach; ?>
        <?php if (!$d) echo '<div class="span12"><p>Aucun document dans ce dossier. <a href="profile.php">[ Retour au compte utilisateur ]</a></p></div>'; ?>
    </div>
</div>
<?php
template();