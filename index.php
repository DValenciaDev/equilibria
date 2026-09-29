<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Página web de Equilibria">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="estilos.css" rel="stylesheet">
	<title>Equilibria</title>
</head>
<body>

    <?php
    require 'funcionesnav.php';
    mostrarNavbar('index.php'); 
    ?> 

    <section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">

     

        <h6 class="text-uppercase border-bottom d-inline-block pb-1 mb-4">EquilibriA</h6>
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
          <img src="logovec2.png" alt="Logo Equilibria" class="logo-navbar">
        </a>

        <h1 class="fw-bold display-4">
          Cuida tu bienestar.
          <span class="text-menta">Conócete, respira y encuentra tu equilibrio.</span>
        </h1>

        <p class="mt-4 text-white-50">
          Un espacio interactivo creado para ayudarte a reconocer cómo te sientes y descubrir pequeñas acciones que pueden contribuir a tu bienestar emocional.
        </p>

        <div class="mt-4 d-flex gap-3">
        <a href="evaluacion.php" class="btn btn-acento px-4 py-2 rounded-pill">Comenzar Evaluacion</a>
        </div>
      </div>

      <div class="col-lg-6 d-flex justify-content-center">
        <div class="hero-blob"></div>
      </div>
    </div>
  </div>
</section>

	<footer>
		<p>&copy; <?php echo date('Y'); ?> Equilibria. Todos los derechos reservados.</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
