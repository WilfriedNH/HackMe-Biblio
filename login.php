<?php

require_once 'inc/loader.php';

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];
    $query = $database->prepare('SELECT * FROM bn_accounts WHERE email = ? AND pass = ?');
    $query->execute(array($email, md5($pass)));
    $result = $query->fetch();
    if ($result) {
        $_SESSION['username'] = $result->name;
        $_SESSION['uid'] = $result->id;
        if ($result->rank == 'admin')
            $_SESSION['admin'] = 1;
        flash('Bienvenue ' . _p($result->name), 'success');
        redirect('index.php');
    }
}

flash('Identifiants invalides.', 'error');
redirect('index.php');