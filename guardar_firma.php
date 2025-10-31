<?php
require_once 'conexion.php';

function limpiar($s) {
    return trim($s);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? limpiar($_POST['nombre']) : '';
    $email  = isset($_POST['email']) ? limpiar($_POST['email']) : '';
    $dni    = isset($_POST['dni']) ? limpiar($_POST['dni']) : '';

    $errors = [];

    if ($nombre === '') $errors[] = 'Nombre vacío';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email inválido';
    if (!preg_match('/^[^@]+@gmail\.com$/i', $email)) $errors[] = 'Debe usar un correo Gmail (@gmail.com).';
    if (!preg_match('/^\d{7,8}$/', $dni)) $errors[] = 'DNI inválido (7 u 8 dígitos).';

    if (!empty($errors)) {
        // mostrar errores simples
        echo '<!doctype html><html><head><meta charset="utf-8"><title>Error</title></head><body>';
        echo '<h3>Errores:</h3><ul>';
        foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>';
        echo '</ul><p><a href="firmas.php">Volver</a></p></body></html>';
        exit;
    }

    $sql = "INSERT INTO firmas (nombre, email, dni) VALUES (:nombre, :email, :dni)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email,
        ':dni'    => $dni
    ]);

    header('Location: ver_firmas.php?msg=gracias');
    exit;
} else {
    header('Location: index.html');
    exit;
}
