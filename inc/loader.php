<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
session_start();
ob_start();

require_once 'config.php';
require_once 'database.php';
require_once 'functions.php';

if (!empty($_COOKIE['banned'])) {
    flash('Le mapping est interdit. Vous avez été banni.', 'error');
    _die();
}