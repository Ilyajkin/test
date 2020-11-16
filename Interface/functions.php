<?php

function connect() {
// подключаемся к серверу
    $config = require_once 'dbconfig.php';
    return mysqli_connect($config['host'], $config['login'], $config['password'], $config['dbname']);
}

function add($connection, $id, $name) {
    return mysqli_query($connection, "INSERT INTO country (id, name) VALUES('$id', '$name')");
}

function get($connection) {
    return $outputQuery = mysqli_query($connection, "SELECT * FROM country");

}

