<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AcequIA - Inicio</title>
    <link rel="icon" type="image/png" href="Icono Web Definito.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: 'Segoe UI', sans-serif;
      }
      .navbar-brand {
        font-weight: bold;
      }
      .intro, .funciona {
        padding: 40px 20px;
        background-color: #f0f8ff;
        opacity: 0;
        transform: translateY(20px);
        transition: all 1s ease;
      }
      .visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
      }
      .funciona-icon {
        width: 64px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
      }
      .funciona-icon:hover {
        transform: scale(1.1);
      }
      footer {
        background-color: #003366;
        color: white;
        text-align: center;
        padding: 20px;
      }
    </style>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">AcequIA</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="firmas.php">Firmas</a></li>
        <li class="nav-item"><a class="nav-link" href="calculadora.html">Calculadora</a></li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <li class="nav-item"><a class="nav-link" href="Novedades.html">Novedades</a></li>
            <li class="nav-item">
              <a class="nav-link" href="Quienes somos.html">Quiénes somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacto.html">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container my-4">

<?php
require_once 'conexion.php';

$metaStmt = $pdo->query("SELECT objetivo, descripcion FROM meta_firmas LIMIT 1");
$meta = $metaStmt->fetch();
$objetivo = $meta ? (int)$meta['objetivo'] : 2000;
$descripcion = $meta ? $meta['descripcion'] : 'Meta de firmas';

$countStmt = $pdo->query("SELECT COUNT(*) as total FROM firmas");
$countRow = $countStmt->fetch();
$total = $countRow ? (int)$countRow['total'] : 0;

$porc = $objetivo > 0 ? min(100, round(($total / $objetivo) * 100, 2)) : 0;

$listStmt = $pdo->query("SELECT id, nombre, fecha FROM firmas ORDER BY fecha DESC LIMIT 50");
$firmas = $listStmt->fetchAll();
?>
  <h2>Progreso de firmas</h2>
  <p><?php echo htmlspecialchars($descripcion); ?></p>

  <div class="mb-3">
    <div class="d-flex justify-content-between">
      <div><strong><?php echo $total; ?></strong> de <?php echo $objetivo; ?> firmas</div>
      <div><?php echo $porc; ?>%</div>
    </div>
    <div class="progress" style="height:24px;">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $porc; ?>%;" aria-valuenow="<?php echo $porc; ?>" aria-valuemin="0" aria-valuemax="100">
        <?php echo $porc; ?>%
      </div>
    </div>
  </div>

  <h5>Últimas firmas</h5>
  <table class="table">
    <thead><tr><th>Nombre</th><th>Fecha</th></tr></thead>
    <tbody>
      <?php foreach ($firmas as $f): ?>
        <tr>
          <td><?php echo htmlspecialchars($f['nombre']); ?></td>
          <td><?php echo htmlspecialchars($f['fecha']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <p><a class="btn btn-primary" href="firmas.php">Agregar firma</a></p>

</div>
<footer>
      <p>© 2025 AcequIA | Proyecto educativo del IES 9-008 Manuel Belgrano</p>
    </footer>
</body>
</html>
