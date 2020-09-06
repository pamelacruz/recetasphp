<?php

function conectar()
{
    require_once 'config.php';
    try {
        $con = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "";
        $con = null;
    }
    return $con;
}

$conn = conectar();
