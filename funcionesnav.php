<?php
function mostrarNavbar($paginaActual = '') {
    $links = [
        'index.php' => 'Inicio',
        'evaluacion.php' => 'Evaluación',
        'actividades.php' => 'Actividades',
        'informacion.php' => 'Información',
        'nosotros.php' => 'Nosotros',
    ];
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
          <img src="logovec2.png" alt="Logo" width="34" height="34" class="rounded-circle">
          <span class="logo-text">Equilibria</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav align-items-lg-center gap-lg-4">
            <?php foreach ($links as $href => $texto): ?>
              <li class="nav-item">
                <a class="nav-link <?= $paginaActual === $href ? 'active' : '' ?>" href="<?= $href ?>"><?= $texto ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <a class="btn btn-acento ms-lg-4 mt-3 mt-lg-0 rounded-pill px-4" href="comenzar.php">Comenzar</a>
        </div>
      </div>
    </nav>
    <?php
}