<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Test de Bienestar Emocional · GHQ-12</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,560;9..144,650&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --green-main:#2F7D5C;
    --green-dark:#173C2C;
    --green-light:#DCEEE3;
    --purple-deep:#3B2064;
    --purple-dark:#241040;
    --blue-deep:#1B3A5C;
    --blue-light:#D7E7F2;
    --ink:#14181B;
    --paper:#FAF9F6;
    --card:#FFFFFF;
    --line:#E4E1D8;
    --muted:#6B6F70;
    padding-top: env(safe-area-inset-top, 0px);
    padding-bottom: env(safe-area-inset-bottom, 0px);
  }
  *{box-sizing:border-box;}
  html{scroll-padding-top: env(safe-area-inset-top, 0px);}
  body{
    margin:0;
    background:var(--paper);
    color:var(--ink);
    font-family:'Inter', system-ui, sans-serif;
    line-height:1.5;
  }
  a{color:inherit;}

  .topbar{
    position:sticky; top:0; z-index:10;
    background:var(--paper);
    padding: calc(14px + env(safe-area-inset-top,0px)) 20px 14px;
    border-bottom:1px solid var(--line);
    display:flex; align-items:center; justify-content:space-between; gap:12px;
  }
  .back-link{
    font-size:0.9rem; font-weight:500;
    text-decoration:none;
    color:var(--purple-deep);
    display:flex; align-items:center; gap:6px;
    white-space:nowrap;
  }
  .back-link:hover{color:var(--green-dark);}
  .progress-wrap{flex:1; max-width:280px;}
  .progress-track{
    height:6px; border-radius:4px; background:var(--line); overflow:hidden;
  }
  .progress-fill{
    height:100%; width:0%; background:linear-gradient(90deg, var(--green-main), var(--blue-deep));
    transition:width .3s ease;
  }
  .progress-label{font-size:0.75rem; color:var(--muted); margin-top:4px; text-align:right;}

  .hero{
    max-width:640px; margin:0 auto; padding:40px 20px 8px;
  }
  .hero h1{
    font-family:'Fraunces', serif;
    font-weight:650;
    font-size:2rem;
    line-height:1.12;
    margin:0 0 10px;
    color:var(--purple-dark);
  }
  .hero p{
    color:var(--muted);
    font-size:0.98rem;
    max-width:52ch;
    margin:0;
  }

  main{max-width:640px; margin:0 auto; padding:24px 20px 120px;}

  .q-card{
    background:var(--card);
    border:1px solid var(--line);
    border-radius:14px;
    padding:20px;
    margin-bottom:16px;
  }
  .q-num{
    font-family:'Fraunces', serif;
    font-size:0.82rem;
    font-weight:560;
    color:var(--green-main);
    margin-bottom:6px;
  }
  .q-text{
    font-size:1.05rem;
    font-weight:500;
    margin:0 0 14px;
    color:var(--ink);
  }
  .options{
    display:grid; grid-template-columns:1fr 1fr; gap:8px;
  }
  @media (max-width:420px){
    .options{grid-template-columns:1fr;}
  }
  .opt{
    position:relative;
  }
  .opt input{
    position:absolute; opacity:0; inset:0; cursor:pointer; margin:0;
  }
  .opt label{
    display:block;
    border:1.5px solid var(--line);
    border-radius:10px;
    padding:10px 12px;
    font-size:0.88rem;
    color:var(--ink);
    cursor:pointer;
    transition:border-color .15s ease, background .15s ease;
  }
  .opt input:checked + label{
    border-color:var(--purple-deep);
    background:var(--green-light);
    color:var(--purple-dark);
    font-weight:600;
  }
  .opt input:focus-visible + label{
    outline:2px solid var(--blue-deep);
    outline-offset:2px;
  }

  .submit-bar{
    max-width:640px; margin:0 auto; padding:8px 20px 0;
  }
  .submit-btn{
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    background:var(--purple-deep);
    color:#fff;
    font-family:'Inter', sans-serif;
    font-size:1rem;
    font-weight:600;
    cursor:pointer;
    transition:background .15s ease;
  }
  .submit-btn:hover{background:var(--purple-dark);}
  .submit-btn:disabled{background:var(--line); color:var(--muted); cursor:not-allowed;}
  .hint{
    text-align:center; font-size:0.82rem; color:var(--muted); margin-top:10px;
  }

  /* Resultado */
  .result{
    max-width:640px; margin:0 auto; padding:48px 20px 100px;
    display:none;
  }
  .result.show{display:block;}
  main.hide{display:none;}
  .submit-bar.hide{display:none;}
  .result-card{
    background:var(--blue-deep);
    color:#fff;
    border-radius:18px;
    padding:32px 28px;
    text-align:center;
  }
  .result-card .score{
    font-family:'Fraunces', serif;
    font-size:3.4rem;
    font-weight:650;
    line-height:1;
    margin:6px 0 2px;
  }
  .result-card .score span{font-size:1.3rem; font-weight:400; opacity:0.75;}
  .result-card .score-label{
    font-size:0.85rem; letter-spacing:0.02em; opacity:0.85;
  }
  .result-msg{
    margin-top:22px;
    background:rgba(255,255,255,0.08);
    border-radius:12px;
    padding:16px 18px;
    font-size:0.95rem;
    text-align:left;
  }
  .result-note{
    margin-top:18px;
    font-size:0.82rem;
    color:var(--muted);
    text-align:center;
  }
  .result-actions{
    display:flex; gap:10px; margin-top:24px; flex-wrap:wrap; justify-content:center;
  }
  .result-actions a, .result-actions button{
    padding:12px 20px;
    border-radius:10px;
    font-size:0.9rem;
    font-weight:600;
    text-decoration:none;
    cursor:pointer;
    border:1.5px solid var(--purple-deep);
    background:transparent;
    color:var(--purple-deep);
    font-family:inherit;
  }
  .result-actions .primary{
    background:var(--green-main);
    border-color:var(--green-main);
    color:#fff;
  }

  @media (prefers-reduced-motion: reduce){
    .progress-fill{transition:none;}
  }
</style>
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