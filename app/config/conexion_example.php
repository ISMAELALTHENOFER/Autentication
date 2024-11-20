<?php
function getConnection()
{
    $host = 'localhost';
    $dbname = 'baseDeDatos';
    $username = 'usuario';
    $password = 'clave';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
