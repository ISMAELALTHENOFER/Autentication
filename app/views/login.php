<?php
require_once __DIR__ . '/../models/Auth.php';

$message = '';
$messageClass = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = Auth::authenticateUser($_POST['email'], $_POST['password']);
    if ($result['status']) {
        $message = "¡Bienvenido : " . $result['user_name'] . "!";
        $messageClass = 'alert-success';
    } else {
        $message = $result['message'];
        $messageClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Incluimos los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Iniciar Sesión</h1>
                        <?php if ($message): ?>
                            <div class="alert <?= $messageClass ?>"><?= htmlspecialchars($message) ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>
                        <p class="mt-3 text-center">¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Incluimos los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>