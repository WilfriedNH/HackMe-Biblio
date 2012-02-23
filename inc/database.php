<?php
try
{
    
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo_options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
    $database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $pdo_options);
    $database->query('SET NAMES utf8');
    
} catch (Exception $e) {
    
    die('Erreur . ' . (DEBUG ? $e->getMessage() : ''));
    
}