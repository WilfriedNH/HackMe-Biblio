<?php

require_once 'inc/loader.php';
rejectNotAdmin();
if (!empty($_GET['file'])) {
    $file= preg_replace('#[^a-zA-Z0-9_\.-]#', '', urldecode($_GET['file']));
    if ($content = file_get_contents(realpath(dirname(__FILE__)) . '/user/uploads/' . uid() . '/' . $file)) {
        header('Content-Type: application/pdf');
        echo $content;
        die();
    } else {
        flash('Fichier inexistant', 'error');
    }
}
redirect('profile.php');