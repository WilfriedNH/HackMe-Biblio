<?php

require_once 'inc/loader.php';

foreach ($_SESSION as $key => $value) {
    $_SESSION[$key] = null;
    unset($_SESSION[$key]);
}
session_destroy();
session_start();
flash('Vous avez été déconnecté.');
redirect('index.php');