<?php

require_once 'inc/loader.php';
rejectNotAdmin();
if (!empty($_FILES)) {
    $file = $_FILES['file'];
    $file['name'] = preg_replace('#[^a-zA-Z0-9_\.-]#', '', $file['name']);
    if (strpos($file['name'], '.pdf')) {
        if ($file['type'] == 'application/pdf') {
            $userdir = realpath(dirname(__FILE__)) . '/user/uploads/' . uid() . '/';
            if (!is_dir($userdir)) {
                mkdir($userdir);
            }
            if (move_uploaded_file($file['tmp_name'], $userdir . basename($file['name']))) {
                flash('Fichier ajouté !', 'success');
                redirect('userfiles.php');
            } else {
                flash('Une erreur est survenue lors de l\'envoi du fichier', 'error');
            }
        } else {
            flash('Le fichier doit être au format PDF', 'error');
        }
    } else {
        flash('Le fichier doit être au format PDF', 'error');
    }
} else {
    flash('Vous n\'avez envoyé aucun fichier', 'error');
}
redirect('profile.php');
template();