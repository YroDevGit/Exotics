<?php

define('PROJECT_ROOT', realpath(__DIR__));

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$scriptPath = pathinfo($scriptName, PATHINFO_DIRNAME);


if (substr($scriptPath, -1) === '/') {
    $scriptPath = substr($scriptPath, 0, -1);
}

define('BASE_URL', $protocol . '://' . $host . $scriptPath);
define("ROOT",BASE_URL."/");
define("ASSETS",BASE_URL."/assets/");
define("POST",BASE_URL."/POST/");
define("BACK_END",BASE_URL."/BACK_END/");


?>