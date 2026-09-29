<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Test de Bienestar Emocional · GHQ-12</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,560;9..144,650&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="estiloseva.css">
</head>
<body>

<div class="topbar">
  <a class="back-link" href="index.html">&larr; Volver al inicio</a>
  <div class="progress-wrap">
    <div class="progress-track"><div class="progress-fill" id="progressFill"></div></div>
    <div class="progress-label" id="progressLabel">0 / 12 respondidas</div>
  </div>
</div>

<div class="hero">
  <h1>Test de bienestar emocional</h1>
  <p>Responde las 12 preguntas pensando en cómo te has sentido en las últimas semanas, comparado con lo habitual en ti. No hay respuestas correctas o incorrectas.</p>
</div>

<main id="quizMain">
  <form id="quizForm"></form>
</main>

<div class="submit-bar" id="submitBar">
  <button class="submit-btn" id="submitBtn" type="button" disabled>Ver resultado</button>
  <p class="hint" id="hintText">Responde todas las preguntas para continuar al siguiente punto</p>
</div>

<div class="result" id="resultSection">
  <div class="result-card">
    <div class="score-label">Puntaje total</div>
    <div class="score"><span id="scoreValue">0</span><span> / 12</span></div>
    <div class="result-msg" id="resultMsg"></div>
  </div>
  <p class="result-note">Este cuestionario es GHQ12 del proyecto de grado.</p>
  <div class="result-actions">
    <button class="primary" id="retakeBtn" type="button">Responder de nuevo</button>
    <a href="index.php">Volver al inicio</a>
  </div>
</div>

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

  // Reglas de puntaje:
  // Preguntas "neg": la opción a (mucho más de lo habitual) = 1 punto, resto = 0
  // Preguntas "pos": la opción b (más que lo habitual) = 1 punto, resto = 0
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
    var pct = Math.round((answered/12)*100);
    progressFill.style.width = pct + '%';
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

  submitBtn.addEventListener('click', function(){
    var score = 0;
    for(var i=0;i<12;i++){ score += answers[i] || 0; }

    document.getElementById('scoreValue').textContent = score;
    document.getElementById('resultMsg').textContent = interpretScore(score);

    document.getElementById('quizMain').classList.add('hide');
    document.getElementById('submitBar').classList.add('hide');
    document.getElementById('resultSection').classList.add('show');
    document.querySelector('.topbar').style.display = 'none';
    document.querySelector('.hero').style.display = 'none';
    window.scrollTo(0,0);
  });

  document.getElementById('retakeBtn').addEventListener('click', function(){
    form.reset();
    answers = {};
    updateProgress();
    document.getElementById('quizMain').classList.remove('hide');
    document.getElementById('submitBar').classList.remove('hide');
    document.getElementById('resultSection').classList.remove('show');
    document.querySelector('.topbar').style.display = 'flex';
    document.querySelector('.hero').style.display = 'block';
    window.scrollTo(0,0);
  });

  updateProgress();
})();
</script>

</body>
</html>