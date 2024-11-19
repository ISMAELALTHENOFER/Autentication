<?php
require_once __DIR__ . '/../config/conexion.php';

class User
{
    public static function createUser($email, $password)
    {
        $conn = getConnection();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);

        if ($stmt->execute()) {
            return "Usuario creado exitosamente";
        } else {
            return "Error al crear el usuario: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
