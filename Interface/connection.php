<?php

require_once 'functions.php';

$connection = connect();
$id = htmlentities(mysqli_real_escape_string($connection, $_POST['id']));
$name = htmlentities(mysqli_real_escape_string($connection, $_POST['name']));
add($connection, $id, $name);

header('Location: interface.php');
die;

