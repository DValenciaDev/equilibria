<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Test de Bienestar Emocional · Equilibria</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Mismos estilos que index.php: aquí viven los colores de la marca -->
<link href="estilos.css" rel="stylesheet">
<style>
  /* Paleta tomada de estilos.css */
  :root{
    --eq-fondo: #10204d;
    --eq-degradado: linear-gradient(135deg, #10204d, #3d1f66);
    --eq-tarjeta: rgba(255,255,255,0.07);
    --eq-borde: rgba(255,255,255,0.16);
    --eq-acento: #60A5FA;
    --eq-texto: #ffffff;
    --eq-suave: rgba(255,255,255,0.68);
  }
  html{scroll-padding-top: env(safe-area-inset-top, 0px);}
  body.eval-page{
    background: var(--eq-degradado) fixed;
    color: var(--eq-texto);
    min-height:100vh;
  }

  .eval-hero{max-width:640px; margin:0 auto; padding:40px 20px 8px;}
  .eval-hero h1{font-weight:700; font-size:2rem; line-height:1.15; margin:0 0 10px;}
  .acento-texto{color:var(--eq-acento);}
  .eval-hero p{color:var(--eq-suave); max-width:52ch; margin:0;}

  #quizMain{max-width:640px; margin:0 auto; padding:24px 20px 24px;}
  #quizMain.hide{display:none;}

  .q-card{
    background:var(--eq-tarjeta);
    border:1px solid var(--eq-borde);
    border-radius:14px;
    padding:20px;
    margin-bottom:16px;
  }
  .q-num{font-size:0.82rem; font-weight:600; color:var(--eq-acento); margin-bottom:6px;}
  .q-text{font-size:1.05rem; font-weight:500; margin:0 0 14px;}
  .options{display:grid; grid-template-columns:1fr 1fr; gap:8px;}
  @media (max-width:420px){ .options{grid-template-columns:1fr;} }
  .opt{position:relative;}
  .opt input{position:absolute; opacity:0; inset:0; cursor:pointer; margin:0;}
  .opt label{
    display:block;
    border:1.5px solid var(--eq-borde);
    border-radius:10px;
    padding:10px 12px;
    font-size:0.88rem;
    cursor:pointer;
    transition:border-color .15s ease, background .15s ease;
  }
  .opt input:checked + label{
    border-color:var(--eq-acento);
    background:rgba(96,165,250,0.18);
    color:var(--eq-acento);
    font-weight:600;
  }
  .opt input:focus-visible + label{outline:2px solid var(--eq-acento); outline-offset:2px;}

  .submit-bar{max-width:640px; margin:0 auto; padding:8px 20px 140px;}
  .submit-bar.hide{display:none;}
  .submit-btn{width:100%; padding:14px; font-weight:600;}
  .submit-btn:disabled{opacity:.4; cursor:not-allowed;}
  .hint{text-align:center; font-size:0.82rem; color:var(--eq-suave); margin-top:10px;}

  /* Barra inferior fija: progreso a la izquierda, volver a la derecha */
  .bottom-bar{
    position:fixed; left:0; right:0; bottom:0; z-index:20;
    display:flex; align-items:center; justify-content:space-between; gap:16px;
    padding:12px 20px calc(12px + env(safe-area-inset-bottom, 0px));
    background:rgba(16,32,77,0.96);
    border-top:1px solid var(--eq-borde);
  }
  .bottom-bar.hide{display:none;}
  .progress-wrap{flex:1; max-width:260px;}
  .progress-track{height:6px; border-radius:4px; background:var(--eq-borde); overflow:hidden;}
  .progress-fill{height:100%; width:0%; background:var(--eq-acento); transition:width .3s ease;}
  .progress-label{font-size:0.78rem; color:var(--eq-suave); margin-top:4px;}
  .back-link{
    font-size:0.9rem; font-weight:500; text-decoration:none;
    color:var(--eq-acento); white-space:nowrap;
  }
  .back-link:hover{text-decoration:underline;}

  /* Resultado */
  .result{max-width:640px; margin:0 auto; padding:48px 20px 100px; display:none;}
  .result.show{display:block;}
  .result-card{
    background:var(--eq-tarjeta);
    border:1px solid var(--eq-borde);
    border-radius:18px;
    padding:32px 28px;
    text-align:center;
  }
  .result-card .score{font-size:3.4rem; font-weight:700; line-height:1; margin:6px 0 2px; color:var(--eq-acento);}
  .result-card .score span.of{font-size:1.3rem; font-weight:400; color:var(--eq-suave);}
  .score-label{font-size:0.85rem; color:var(--eq-suave);}
  .result-msg{
    margin-top:22px;
    background:rgba(255,255,255,0.08);
    border-radius:12px;
    padding:16px 18px;
    font-size:0.95rem;
    text-align:left;
  }
  .result-note{margin-top:18px; font-size:0.82rem; color:var(--eq-suave); text-align:center;}
  .result-actions{display:flex; gap:10px; margin-top:24px; flex-wrap:wrap; justify-content:center;}

  @media (prefers-reduced-motion: reduce){ .progress-fill{transition:none;} }
</style>
</head>
<body class="eval-page">

<?php
require 'funcionesnav.php';
mostrarNavbar('evaluacion.php');
?>

<div class="eval-hero" id="evalHero">
  <h1>Test de <span class="acento-texto">bienestar emocional</span></h1>
  <p>Responde las 12 preguntas pensando en cómo te has sentido en las últimas semanas, comparado con lo habitual en ti. No hay respuestas correctas o incorrectas.</p>
</div>

<main id="quizMain">
  <form id="quizForm"></form>
</main>

<div class="submit-bar" id="submitBar">
  <button class="btn btn-acento rounded-pill submit-btn" id="submitBtn" type="button" disabled>Ver resultado</button>
  <p class="hint" id="hintText">Responde todas las preguntas para continuar</p>
</div>

<!-- Barra inferior: progreso (izquierda) + volver al inicio (derecha) -->
<div class="bottom-bar" id="bottomBar">
  <div class="progress-wrap">
    <div class="progress-track"><div class="progress-fill" id="progressFill"></div></div>
    <div class="progress-label" id="progressLabel">0 / 12 respondidas</div>
  </div>
  <a class="back-link" href="index.php">Volver al inicio &rarr;</a>
</div>

<div class="result" id="resultSection">
  <div class="result-card">
    <div class="score-label">Puntaje total</div>
    <div class="score"><span id="scoreValue">0</span><span class="of"> / 12</span></div>
    <div class="result-msg" id="resultMsg"></div>
  </div>
  <p class="result-note">Este cuestionario es GHQ12 del proyecto de grado.</p>
  <div class="result-actions">
    <button class="btn btn-acento rounded-pill px-4" id="retakeBtn" type="button">Responder de nuevo</button>
    <a class="btn btn-outline-light rounded-pill px-4" href="index.php">Volver al inicio</a>
  </div>
</div>

<footer class="text-center py-3">
  <p class="mb-0">&copy; <?php echo date('Y'); ?> Equilibria. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
(function(){
  var questions = [
    { text: "¿Sus preocupaciones le han hecho perder mucho sueño?", type: "neg" },
    { text: "¿Se ha sentido triste o deprimido?", type: "neg" },
    { text: "¿Se ha sentido constantemente agobiado y en tensión?", type: "neg" },
    { text: "¿Ha sentido que no puede superar sus dificultades?", type: "neg" },
    { text: "¿Se siente razonablemente feliz considerando todas las circunstancias?", type: "pos" },
    { text: "¿Ha pensado que usted es una persona que no vale para nada?", type: "neg" },
    { text: "¿Ha sentido que está jugando un papel útil en la vida?", type: "pos" },
    { text: "¿Se ha sentido capaz de tomar decisiones?", type: "pos" },
    { text: "¿Ha sido capaz de hacer frente a sus problemas?", type: "pos" },
    { text: "¿Ha perdido confianza en sí mismo?", type: "neg" },
    { text: "¿Ha podido concentrarse bien en lo que hace?", type: "pos" },
    { text: "¿Ha sido capaz de disfrutar sus actividades normales de cada día?", type: "pos" }
  ];

  var options = [
    { id: "a", label: "Mucho más de lo habitual" },
    { id: "b", label: "Más que lo habitual" },
    { id: "c", label: "Igual que lo habitual" },
    { id: "d", label: "Menos que lo habitual" }
  ];

  // Reglas de puntaje (sin cambios):
  // "neg": opción a = 1 punto. "pos": opción b = 1 punto.
  function pointsFor(type, optionId){
    if(type === "neg" && optionId === "a") return 1;
    if(type === "pos" && optionId === "b") return 1;
    return 0;
  }

  var form = document.getElementById('quizForm');
  var answers = {};

  questions.forEach(function(q, i){
    var card = document.createElement('div');
    card.className = 'q-card';

    var num = document.createElement('div');
    num.className = 'q-num';
    num.textContent = 'Pregunta ' + (i+1) + ' de 12';
    card.appendChild(num);

    var text = document.createElement('p');
    text.className = 'q-text';
    text.textContent = q.text;
    card.appendChild(text);

    var opts = document.createElement('div');
    opts.className = 'options';

    options.forEach(function(opt){
      var wrap = document.createElement('div');
      wrap.className = 'opt';

      var input = document.createElement('input');
      input.type = 'radio';
      input.name = 'q' + i;
      input.id = 'q' + i + '_' + opt.id;
      input.value = opt.id;
      input.addEventListener('change', function(){
        answers[i] = pointsFor(q.type, opt.id);
        updateProgress();
      });

      var label = document.createElement('label');
      label.setAttribute('for', input.id);
      label.textContent = opt.label;

      wrap.appendChild(input);
      wrap.appendChild(label);
      opts.appendChild(wrap);
    });

    card.appendChild(opts);
    form.appendChild(card);
  });

  var progressFill = document.getElementById('progressFill');
  var progressLabel = document.getElementById('progressLabel');
  var submitBtn = document.getElementById('submitBtn');
  var hintText = document.getElementById('hintText');

  function updateProgress(){
    var answered = Object.keys(answers).length;
    progressFill.style.width = Math.round((answered/12)*100) + '%';
    progressLabel.textContent = answered + ' / 12 respondidas';
    submitBtn.disabled = answered < 12;
    hintText.textContent = answered < 12
      ? 'Responde todas las preguntas para continuar'
      : 'Ya puedes ver tu resultado';
  }

  function interpretScore(score){
    if(score <= 2){
      return "Tus respuestas sugieren un nivel de malestar emocional bajo en este momento. Sigue prestando atención a cómo te sientes.";
    } else if(score <= 5){
      return "Tus respuestas sugieren un nivel de malestar emocional moderado. Puede ser útil hablar de esto con alguien de confianza.";
    } else {
      return "Tus respuestas sugieren un nivel de malestar emocional considerable. Te recomendamos conversarlo con un profesional de salud mental.";
    }
  }

  function setQuizVisible(visible){
    document.getElementById('quizMain').classList.toggle('hide', !visible);
    document.getElementById('submitBar').classList.toggle('hide', !visible);
    document.getElementById('bottomBar').classList.toggle('hide', !visible);
    document.getElementById('evalHero').style.display = visible ? 'block' : 'none';
    document.getElementById('resultSection').classList.toggle('show', !visible);
  }

  submitBtn.addEventListener('click', function(){
    var score = 0;
    for(var i=0;i<12;i++){ score += answers[i] || 0; }
    document.getElementById('scoreValue').textContent = score;
    document.getElementById('resultMsg').textContent = interpretScore(score);
    setQuizVisible(false);
    window.scrollTo(0,0);
  });

  document.getElementById('retakeBtn').addEventListener('click', function(){
    form.reset();
    answers = {};
    updateProgress();
    setQuizVisible(true);
    window.scrollTo(0,0);
  });

  updateProgress();
})();
</script>

</body>
</html>
