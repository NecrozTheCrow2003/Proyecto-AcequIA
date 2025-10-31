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
<div class="container my-4" id="intro">

<h2>Firmá para financiar AcequIA</h2>
<p>Ayudanos a juntar firmas para presentar el proyecto ante autoridades. Tus datos son sensibles: el DNI no se mostrará públicamente.</p>

<form id="formFirma" class="needs-validation" novalidate method="post" action="guardar_firma.php">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre completo</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="120">
    <div class="invalid-feedback">Ingresá tu nombre.</div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Gmail</label>
    <input type="email" class="form-control" id="email" name="email" required maxlength="150" placeholder="ejemplo@gmail.com">
    <div class="invalid-feedback" id="emailFeedback">Ingresá un email válido y de Gmail.</div>
  </div>

  <div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" required maxlength="12" placeholder="Solo números">
    <div class="invalid-feedback" id="dniFeedback">Ingresá tu DNI (7-8 números).</div>
  </div>

  <button class="btn btn-primary" type="submit">Firmar</button>
</form>

<script>
(function () {
  'use strict'
  const form = document.getElementById('formFirma');

  form.addEventListener('submit', function (event) {
    document.getElementById('emailFeedback').textContent = 'Ingresá un email válido y de Gmail.';
    document.getElementById('dniFeedback').textContent = 'Ingresá tu DNI (7-8 números).';

    let valid = form.checkValidity();

    const email = document.getElementById('email').value.trim();
    const dni = document.getElementById('dni').value.trim();

    if (!/^[^@]+@gmail\.com$/i.test(email)) {
      valid = false;
      document.getElementById('email').classList.add('is-invalid');
      document.getElementById('emailFeedback').textContent = 'Debe ser una dirección @gmail.com';
    } else {
      document.getElementById('email').classList.remove('is-invalid');
    }

    if (!/^\d{7,8}$/.test(dni)) {
      valid = false;
      document.getElementById('dni').classList.add('is-invalid');
      document.getElementById('dniFeedback').textContent = 'DNI debe tener 7 u 8 números';
    } else {
      document.getElementById('dni').classList.remove('is-invalid');
    }

    if (!valid) {
      event.preventDefault();
      event.stopPropagation();
      form.classList.add('was-validated');
    }
  }, false)
})()
</script>
<script>
  window.addEventListener('scroll', () => {
    const intro = document.getElementById('intro');
    const screenPosition = window.innerHeight / 1.3;
    const position = intro.getBoundingClientRect().top;
    if (position < screenPosition) {
      intro.classList.add('visible');
    }
  });
</script>

</div>
<footer>
      <p>© 2025 AcequIA | Proyecto educativo del IES 9-008 Manuel Belgrano</p>
    </footer>
</body>
</html>
