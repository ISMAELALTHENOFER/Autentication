<?php
require_once __DIR__ . '/../config/conexion.php';


class Auth
{
    public static function authenticateUser($email, $password)
    {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                return [
                    'status' => true,
                    'message' => 'Autenticación exitosa',
                    'user_id' => $userId
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Contraseña incorrecta'
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'Usuario no encontrado'
            ];
        }

        $stmt->close();
        $conn->close();
    }
}
