<?php
// Incluimos el archivo que contiene la función para establecer la conexión a la base de datos.
require_once __DIR__ . '/../config/conexion.php';

class User
{
    public static function createUser($email, $password, $name)
    {
        // Validar la contraseña
        if (!preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).{4,}$/', $password)) {
            return "La contraseña debe tener al menos 4 caracteres, una letra mayúscula y un carácter especial.";
        }
        $conn = getConnection();
        // Hash de la contraseña.
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Preparamos la consulta SQL para insertar un nuevo usuario con nombre.
        $stmt = $conn->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
        // Asignamos los valores a los parámetros de la consulta para evitar inyecciones SQL.
        $stmt->bind_param("sss", $email, $hashedPassword, $name);

        // Ejecutamos la consulta y verificamos si se ejecutó correctamente.
        if ($stmt->execute()) {
            // Mensaje de éxito.
            return "Usuario creado exitosamente";
        } else {
            // Mensaje de error.
            return "Error al crear el usuario: " . $stmt->error;
        }
        // Cerramos la conexión a la base de datos.
        $stmt->close();
        $conn->close();
    }
}
