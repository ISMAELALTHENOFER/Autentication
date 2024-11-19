<?php
function getConnection()
{
    $host = 'localhost';
    $dbname = 'proyecto';
    $username = 'root';
    $password = 'Cuenta.1234';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
