<?php

function rstrstr($haystack,$needle)
{
    return substr($haystack, 0, strrpos($haystack, $needle));
}

function baseUrl() {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . rstrstr($_SERVER['PHP_SELF'], '/');
    return rtrim($url, '/');
}

function isAdmin() {
    return (!empty($_SESSION['admin']) && $_SESSION['admin'] == 1);
}

function isUser() {
    return (!empty($_SESSION['username']));
}

function rejectNotAdmin() {
	if (!isAdmin()) {
		header('HTTP/1.1 403 Forbidden');
		echo '<h1>Forbidden</h1>';
		die();
	}
}

function rejectNotUser() {
	if (!isUser()) {
		header('HTTP/1.1 403 Forbidden');
		echo '<h1>Forbidden</h1>';
		die();
	}
}

function getUserIp() {
    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else {
        return $_SERVER["REMOTE_ADDR"];
    }
}


function _constant($var, $default='') {
    return (defined($var)) ? constant($var) : $default;
}

function _c($var, $default='') {
    echo _constant($var, $default);
}

function _die($msg='') {
    template($msg);
    die();
}

function template($content=false) {
    if ($content === false) {
        $content = ob_get_clean();
    }
    ob_start();
    include 'template/' . (defined('TEMPLATE') ? TEMPLATE : 'default') . '/page.php';
    echo str_replace('{{content}}', $content, ob_get_clean());
}

function redirect($page) {
    header('Location:' . $page);
    die();
}

function checkInt($string) {
    if (!preg_match('#\d+#', $string))
        return false;
    return true;
}

function displayFlash() {
    if (!isset($_SESSION['flash']))
        return false;
    foreach ($_SESSION['flash'] as $flash) {
        echo '<div class="alert alert-' . $flash['type'] . '">' . $flash['message'] . '<a class="close" data-dismiss="alert" href="#">&times;</a></div>';
    }
    $_SESSION['flash'] = array();
}

function flash($message, $type = 'info') {
    $_SESSION['flash'][] = array('type' => $type, 'message' => $message);
}

function _p($str) {
    return htmlspecialchars($str);
}

function randomPass() {
    mt_srand();
    $pass = '';
    $chars = 'azertyuiopqsdfghjklmwxcvbn1234567890$-_+/!?&@';
    while (strlen($pass) < 10) {
        $char = substr($chars, (mt_rand() % strlen($chars)), 1);
        $pass .= mt_rand(0, 100) > 42 ? $char : strtoupper($char);
    }
    return $pass;
}

function _q($array) {
    if (get_magic_quotes_gpc()) {
        if (is_array($array))
            return array_map('stripslashes', $array);
        else
            return stripslashes($array);
    }
    return $array;
}

function value($name) {
    return !empty($_POST[$name]) ? _p($_POST[$name]) : '';
}

function uname() {
    if (isUser())
        echo _p($_SESSION['username']);
}

function uid() {
    if (isUser()) {
        return $_SESSION['uid'];
    }
}

function _a(&$array) {
    $array = is_array($array) ? $array : array();
}
?>