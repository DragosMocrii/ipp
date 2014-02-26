<?php

function &load($class, $directory = '') {
    static $loaded = array();
    if (isset($loaded[$class]))
        return $loaded[$class];
    //else continue
    if ($directory == '' && !isset($loaded[$class]))
        die('Trying to acces class not loaded.');
    include_once($directory . '/' . $class . '.php');
    $loaded[$class] = new $class();
    return $loaded[$class];
}

function &get_instance() {
    return rs_controller::get_instance();
}

function &get_pdo() {
    static $pdo = NULL;
    if ($pdo === NULL)
        $pdo = new PDO(
                        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                        DB_U,
                        DB_P,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    return $pdo;
}

function authentificate() {
    if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != ADMIN_U || $_SERVER['PHP_AUTH_PW'] != ADMIN_P) {
        header('WWW-Authenticate: Basic realm="Please authentificate!"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'You need to authentificate.';
        exit;
    }
}