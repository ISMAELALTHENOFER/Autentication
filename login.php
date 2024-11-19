<?php
require_once __DIR__ . '/src/Auth.php';

$message = '';
$messageClass = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = Auth::authenticateUser($_POST['email'], $_POST['password']);
    if ($result['status']) {
        $message = "¡Bienvenido, usuario ID: " . $result['user_id'] . "!";
        $messageClass = 'success';
    } else {
        $message = $result['message'];
        $messageClass = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <?php if ($message): ?>
            <div class="message <?= $messageClass ?>"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" class="form">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>.</p>
    </div>
</body>

</html>