<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<title>Equilibria — Proyecto de grado sobre salud mental</title>
<meta name="description" content="Equilibria es un proyecto de grado que acompaña la salud mental con información clara, bienestar e inteligencia artificial." />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600;9..144,700&family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --violet: #5B3E96;
    --violet-soft: #7A5FB8;
    --blue: #2F6F9E;
    --blue-soft: #4A8FBE;
    --green: #2E9E72;
    --green-soft: #4DBB8F;
    --bg: #F6F7F5;
    --bg-panel: #FFFFFF;
    --ink: #1A1F1C;
    --ink-soft: #4A5350;
    --line: rgba(26, 31, 28, 0.12);
    --shadow: 0 20px 60px -30px rgba(30, 40, 60, 0.35);
    box-sizing: border-box;
    padding-top: env(safe-area-inset-top, 0px);
    padding-bottom: env(safe-area-inset-bottom, 0px);
  }
  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --bg: #14171A;
      --bg-panel: #1B1F22;
      --ink: #F2F3F1;
      --ink-soft: #B7BDB9;
      --line: rgba(242, 243, 241, 0.14);
      --shadow: 0 20px 60px -30px rgba(0, 0, 0, 0.6);
    }
  }
  :root[data-theme="dark"] {
    --bg: #14171A;
    --bg-panel: #1B1F22;
    --ink: #F2F3F1;
    --ink-soft: #B7BDB9;
    --line: rgba(242, 243, 241, 0.14);
    --shadow: 0 20px 60px -30px rgba(0, 0, 0, 0.6);
  }
  html { scroll-behavior: smooth; scroll-padding-top: env(safe-area-inset-top, 0px); }
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    background: var(--bg);
    color: var(--ink);
    font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.55;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }
  h1, h2, h3 { font-family: 'Fraunces', Georgia, serif; font-weight: 500; letter-spacing: -0.01em; line-height: 1.08; }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }
  .wrap { max-width: 1120px; margin: 0 auto; padding: 0 28px; }
  .narrow { max-width: 680px; }

  /* ---------- NAV ---------- */
  header {
    position: sticky; top: env(safe-area-inset-top, 0px); z-index: 40;
    background: color-mix(in srgb, var(--bg) 88%, transparent);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--line);
  }
  nav.wrap { display: flex; align-items: center; justify-content: space-between; height: 76px; }
  .brand { display: flex; align-items: center; gap: 10px; font-family: 'Fraunces', serif; font-size: 1.28rem; font-weight: 600; }
  .brand-mark {
    width: 30px; height: 30px; border-radius: 50%;
    background: conic-gradient(from 200deg, var(--green), var(--blue), var(--violet), var(--green));
    flex-shrink: 0;
  }
  .nav-links { display: flex; gap: 34px; font-size: 0.95rem; color: var(--ink-soft); }
  .nav-links a { transition: color .18s ease; }
  .nav-links a:hover { color: var(--ink); }
  .nav-cta {
    padding: 10px 20px; border-radius: 100px; font-size: 0.9rem; font-weight: 600;
    background: var(--ink); color: var(--bg); transition: opacity .18s ease;
  }
  .nav-cta:hover { opacity: 0.82; }
  .nav-toggle { display: none; background: none; border: none; color: var(--ink); font-size: 1.6rem; cursor: pointer; }

  /* ---------- HERO ---------- */
  .hero {
    position: relative;
    padding: 96px 0 110px;
    overflow: hidden;
  }
  .hero-grid {
    display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 56px; align-items: center;
  }
  .eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.85rem; color: var(--ink-soft); margin-bottom: 22px;
  }
  .eyebrow::before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: var(--green); }
  .hero h1 { font-size: clamp(2.3rem, 4.6vw, 3.6rem); max-width: 15ch; }
  .hero h1 em { font-style: normal; background: linear-gradient(100deg, var(--green) 0%, var(--blue) 50%, var(--violet) 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
  .hero p.lede { margin-top: 24px; font-size: 1.12rem; color: var(--ink-soft); max-width: 46ch; }
  .hero-actions { display: flex; align-items: center; gap: 22px; margin-top: 38px; flex-wrap: wrap; }
  .btn-primary {
    padding: 14px 28px; border-radius: 100px; font-weight: 600; font-size: 0.97rem;
    background: linear-gradient(100deg, var(--green), var(--blue));
    color: #fff; box-shadow: var(--shadow); transition: transform .18s ease;
  }
  .btn-primary:hover { transform: translateY(-2px); }
  .btn-text { font-weight: 600; font-size: 0.95rem; border-bottom: 1px solid var(--line); padding-bottom: 2px; }

  .hero-orb {
    position: relative; aspect-ratio: 1; border-radius: 50%;
    background: radial-gradient(circle at 30% 28%, var(--green-soft), transparent 55%),
                radial-gradient(circle at 70% 35%, var(--blue-soft), transparent 55%),
                radial-gradient(circle at 50% 75%, var(--violet-soft), transparent 60%),
                var(--bg-panel);
    box-shadow: var(--shadow);
    animation: float 9s ease-in-out infinite;
  }
  .hero-orb::after {
    content: ""; position: absolute; inset: 14%; border-radius: 50%;
    border: 1px solid var(--line);
  }
  @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
  @media (prefers-reduced-motion: reduce) { .hero-orb { animation: none; } }

  .stat-row { display: flex; gap: 40px; margin-top: 64px; flex-wrap: wrap; }
  .stat b { display: block; font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 500; }
  .stat span { font-size: 0.88rem; color: var(--ink-soft); }

  /* ---------- SECTION LABELS ---------- */
  section { padding: 96px 0; }
  .section-head { max-width: 620px; margin-bottom: 52px; }
  .section-head .kicker { font-size: 0.85rem; color: var(--blue-soft); font-weight: 600; margin-bottom: 12px; display: block; }
  .section-head h2 { font-size: clamp(1.7rem, 3vw, 2.3rem); }
  .section-head p { margin-top: 16px; color: var(--ink-soft); font-size: 1.04rem; }

  /* ---------- MISSION ---------- */
  .mission { border-top: 1px solid var(--line); }
  .mission-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 60px; align-items: start; }
  .mission blockquote {
    font-family: 'Fraunces', serif; font-size: clamp(1.4rem, 2.6vw, 1.9rem); font-weight: 400;
    line-height: 1.32; border-left: 2px solid var(--green); padding-left: 26px;
  }
  .mission-copy p { color: var(--ink-soft); margin-bottom: 18px; }
  .mission-copy p:last-child { margin-bottom: 0; }

  /* ---------- PILLARS ---------- */
  .pillars { background: var(--bg-panel); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); }
  .pillar-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--line); border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
  .pillar { background: var(--bg-panel); padding: 38px 30px; }
  .pillar-num { font-family: 'Fraunces', serif; font-size: 0.85rem; color: var(--ink-soft); margin-bottom: 22px; }
  .pillar h3 { font-size: 1.28rem; margin-bottom: 12px; }
  .pillar p { color: var(--ink-soft); font-size: 0.97rem; }
  .pillar .dot { width: 34px; height: 34px; border-radius: 10px; margin-bottom: 18px; }
  .pillar:nth-child(1) .dot { background: linear-gradient(135deg, var(--green), var(--green-soft)); }
  .pillar:nth-child(2) .dot { background: linear-gradient(135deg, var(--blue), var(--blue-soft)); }
  .pillar:nth-child(3) .dot { background: linear-gradient(135deg, var(--violet), var(--violet-soft)); }

  /* ---------- TEAM ---------- */
  .team-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 44px; }
  .member { text-align: center; }
  .member-photo {
    width: 168px; height: 168px; border-radius: 50%; margin: 0 auto 22px;
    position: relative; padding: 5px;
  }
  .member:nth-child(1) .member-photo { background: conic-gradient(from 120deg, var(--green), var(--green-soft), var(--blue)); }
  .member:nth-child(2) .member-photo { background: conic-gradient(from 120deg, var(--blue), var(--blue-soft), var(--violet)); }
  .member:nth-child(3) .member-photo { background: conic-gradient(from 120deg, var(--violet), var(--violet-soft), var(--green)); }
  .member-photo-inner {
    width: 100%; height: 100%; border-radius: 50%; overflow: hidden;
    background: var(--bg); display: flex; align-items: center; justify-content: center;
  }
  .member-photo-inner img { width: 100%; height: 100%; object-fit: cover; }
  .member-photo-inner .placeholder { font-family: 'Fraunces', serif; font-size: 0.78rem; color: var(--ink-soft); text-align: center; padding: 0 14px; }
  .member h3 { font-size: 1.12rem; font-weight: 600; font-family: 'Public Sans', sans-serif; }
  .member .role { font-size: 0.9rem; color: var(--ink-soft); margin-top: 4px; }

  /* ---------- CTA / FOOTER ---------- */
  .cta {
    border-radius: 26px; padding: 64px 52px; text-align: left;
    background: linear-gradient(120deg, var(--green) 0%, var(--blue) 52%, var(--violet) 100%);
    color: #fff; display: grid; grid-template-columns: 1.3fr 0.7fr; gap: 30px; align-items: center;
  }
  .cta h2 { color: #fff; font-size: clamp(1.7rem, 3vw, 2.2rem); max-width: 18ch; }
  .cta p { color: rgba(255,255,255,0.85); margin-top: 14px; max-width: 40ch; }
  .cta .btn-primary { background: #fff; color: var(--ink); box-shadow: none; }
  .cta .btn-primary:hover { opacity: 0.9; }

  footer { padding: 56px 0 40px; border-top: 1px solid var(--line); }
  .foot-grid { display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 24px; }
  .foot-note { color: var(--ink-soft); font-size: 0.86rem; max-width: 42ch; }

  @media (max-width: 860px) {
    .nav-links { display: none; }
    .nav-toggle { display: block; }
    .hero-grid { grid-template-columns: 1fr; }
    .hero-orb { max-width: 260px; margin: 0 auto; }
    .mission-grid { grid-template-columns: 1fr; }
    .pillar-list { grid-template-columns: 1fr; }
    .team-grid { grid-template-columns: 1fr; gap: 36px; }
    .cta { grid-template-columns: 1fr; text-align: left; padding: 44px 30px; }
    .stat-row { gap: 28px; }
  }

  /* ---------- CARRUSEL ---------- */
  .carousel { border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); background: var(--bg-panel); }
  .carousel-shell { position: relative; }
  .carousel-viewport { overflow: hidden; border-radius: 22px; }
  .carousel-track { display: flex; transition: transform .5s cubic-bezier(.65,0,.35,1); }
  @media (prefers-reduced-motion: reduce) { .carousel-track { transition: none; } }
  .slide { flex: 0 0 100%; display: grid; grid-template-columns: 0.85fr 1.15fr; gap: 0; align-items: stretch; }
  .slide-art {
    display: flex; align-items: center; justify-content: center; padding: 48px;
    min-height: 340px;
  }
  .slide-art svg { width: 100%; max-width: 260px; height: auto; }
  .slide-text { padding: 52px 52px 52px 8px; display: flex; flex-direction: column; justify-content: center; }
  .slide-tag { font-size: 0.82rem; font-weight: 600; color: var(--blue-soft); margin-bottom: 14px; }
  .slide-text h3 { font-size: clamp(1.4rem, 2.6vw, 1.9rem); margin-bottom: 16px; }
  .slide-text p { color: var(--ink-soft); font-size: 1rem; max-width: 46ch; }

  .carousel-controls { display: flex; align-items: center; justify-content: center; gap: 22px; margin-top: 26px; }
  .car-btn {
    width: 44px; height: 44px; border-radius: 50%; border: 1px solid var(--line);
    background: var(--bg); display: flex; align-items: center; justify-content: center;
    cursor: pointer; color: var(--ink); flex-shrink: 0; transition: background .18s ease, transform .12s ease;
  }
  .car-btn:hover { background: var(--bg-panel); }
  .car-btn:active { transform: scale(0.94); }
  .car-btn:focus-visible { outline: 2px solid var(--blue); outline-offset: 2px; }
  .car-btn svg { width: 18px; height: 18px; }
  .car-dots { display: flex; gap: 9px; }
  .car-dot {
    width: 9px; height: 9px; border-radius: 50%; background: var(--line); border: none; cursor: pointer; padding: 0;
    transition: background .18s ease, transform .18s ease;
  }
  .car-dot.active { background: linear-gradient(100deg, var(--green), var(--blue)); transform: scale(1.25); }
  .car-dot:focus-visible { outline: 2px solid var(--blue); outline-offset: 2px; }

  @media (max-width: 760px) {
    .slide { grid-template-columns: 1fr; }
    .slide-art { min-height: 200px; padding: 34px 34px 0; }
    .slide-text { padding: 24px 30px 40px; }
  }
</style>
</head>
<body>

<header>
  <nav class="wrap">
    <div class="brand"><span class="brand-mark"></span>Equilibria</div>
    <div class="nav-links">
      <a href="#mision">Misión</a>
      <a href="#temas">Temas</a>
      <a href="#equipo">Equipo</a>
      <a href="#contacto">Contacto</a>
    </div>
    <a class="nav-cta" href="#contacto">Hablemos</a>
  </nav>
</header>

<main>
  <section class="hero">
    <div class="wrap hero-grid">
      <div>
        <span class="eyebrow">Proyecto de grado</span>
        <h1>Hablemos de salud mental con <em>información clara</em> y acompañamiento real.</h1>
        <p class="lede">Equilibria es un proyecto de grado que reúne información confiable sobre salud mental, hábitos de bienestar e inteligencia artificial, para que entender lo que sentimos sea un poco más sencillo.</p>
        <div class="hero-actions">
          <a class="btn-primary" href="#temas">Explorar temas</a>
          <a class="btn-text" href="#mision">Sobre el proyecto ↓</a>
        </div>
        <div class="stat-row">
          <div class="stat"><b>5</b><span>temas de salud mental explicados</span></div>
          <div class="stat"><b>3</b><span>pilares: información, bienestar e IA</span></div>
          <div class="stat"><b>1</b><span>propósito: acompañar, no diagnosticar</span></div>
        </div>
      </div>
      <div class="hero-orb" aria-hidden="true"></div>
    </div>
  </section>

  <section class="mission" id="mision">
    <div class="wrap mission-grid">
      <blockquote>"Entender lo que sentimos es el primer paso para cuidarlo."</blockquote>
      <div class="mission-copy">
        <p>Equilibria nace como proyecto de grado con una idea simple: todavía existe mucho estigma y poca información clara sobre salud mental. Muchas personas conviven con la ansiedad, la depresión o el estrés sin saber ponerles nombre.</p>
        <p>Por eso reunimos información breve y confiable sobre distintos temas de salud mental, junto con hábitos de bienestar y herramientas de inteligencia artificial, para acompañar —nunca reemplazar— el apoyo profesional.</p>
      </div>
    </div>
  </section>

  <section class="carousel" id="temas">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Temas</span>
        <h2>Cinco temas de salud mental, explicados con calma</h2>
        <p>Desliza entre las tarjetas para conocer qué es cada tema, cómo suele sentirse y por qué merece atención.</p>
      </div>

      <div class="carousel-shell">
        <div class="carousel-viewport">
          <div class="carousel-track" id="carouselTrack">

            <div class="slide">
              <div class="slide-art">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <defs><linearGradient id="g1" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#4A8FBE"/><stop offset="1" stop-color="#5B3E96"/>
                  </linearGradient></defs>
                  <ellipse cx="100" cy="95" rx="62" ry="40" fill="url(#g1)" opacity="0.18"/>
                  <path d="M55 100c0-24 20-40 45-40s45 16 45 40-20 30-45 30-45-6-45-30Z" fill="url(#g1)" opacity="0.5"/>
                  <path d="M70 145c8 14 12 22 6 34M100 148c6 12 8 22 2 32M130 145c8 12 10 20 4 30" stroke="url(#g1)" stroke-width="5" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="slide-text">
                <span class="slide-tag">Tema 1 de 5</span>
                <h3>Depresión</h3>
                <p>Es un estado de ánimo persistente de tristeza o vacío, que se acompaña de bajas de energía y de interés en actividades que antes se disfrutaban. No es "estar triste un día": suele durar semanas y afecta el sueño, el apetito y la concentración. Se trata, y hablar con un profesional es un buen primer paso.</p>
              </div>
            </div>

            <div class="slide">
              <div class="slide-art">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <defs><linearGradient id="g2" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#2E9E72"/><stop offset="1" stop-color="#2F6F9E"/>
                  </linearGradient></defs>
                  <circle cx="100" cy="100" r="60" fill="url(#g2)" opacity="0.14"/>
                  <path d="M100 40c-33 0-60 27-60 60M100 160c33 0 60-27 60-60M60 60c11 11 11 29 0 40M140 140c-11-11-11-29 0-40" stroke="url(#g2)" stroke-width="6" stroke-linecap="round"/>
                  <circle cx="100" cy="100" r="14" fill="url(#g2)"/>
                </svg>
              </div>
              <div class="slide-text">
                <span class="slide-tag">Tema 2 de 5</span>
                <h3>Ansiedad</h3>
                <p>Es la respuesta natural del cuerpo frente a una amenaza percibida: el corazón se acelera, la mente se acelera y cuesta quedarse quieto. Un poco de ansiedad es útil, pero cuando aparece sin motivo claro, con mucha frecuencia o intensidad, empieza a limitar la vida diaria y conviene buscar apoyo.</p>
              </div>
            </div>

            <div class="slide">
              <div class="slide-art">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <defs><linearGradient id="g3" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#5B3E96"/><stop offset="1" stop-color="#2E9E72"/>
                  </linearGradient></defs>
                  <path d="M50 70c30-20 70-20 100 0M50 100c30-20 70-20 100 0M50 130c30-20 70-20 100 0" stroke="url(#g3)" stroke-width="6" stroke-linecap="round" opacity="0.85"/>
                  <circle cx="60" cy="70" r="6" fill="url(#g3)"/>
                  <circle cx="140" cy="130" r="6" fill="url(#g3)"/>
                </svg>
              </div>
              <div class="slide-text">
                <span class="slide-tag">Tema 3 de 5</span>
                <h3>Estrés</h3>
                <p>Aparece cuando sentimos que las exigencias superan los recursos que tenemos para enfrentarlas: tiempo, energía o apoyo. En dosis cortas puede ayudarnos a rendir; sostenido en el tiempo, desgasta el cuerpo y el ánimo. Identificar sus fuentes es clave para poder soltarlas de a poco.</p>
              </div>
            </div>

            <div class="slide">
              <div class="slide-art">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <defs><linearGradient id="g4" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#2F6F9E"/><stop offset="1" stop-color="#5B3E96"/>
                  </linearGradient></defs>
                  <path d="M100 150c-30 0-45-20-45-42 0-24 20-38 20-58 0 20 14 24 14 42 8-10 8-24 4-36 20 12 27 34 27 52 0 22-15 42-20 42Z" fill="url(#g4)" opacity="0.55"/>
                </svg>
              </div>
              <div class="slide-text">
                <span class="slide-tag">Tema 4 de 5</span>
                <h3>Burnout (agotamiento)</h3>
                <p>Es un agotamiento físico y emocional causado por estrés crónico, casi siempre ligado al trabajo o al estudio. Se reconoce por la sensación de estar "vacío", la distancia emocional con lo que antes importaba y la caída en el rendimiento. Descansar de verdad y ajustar la carga son parte de la salida.</p>
              </div>
            </div>

            <div class="slide">
              <div class="slide-art">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <defs><linearGradient id="g5" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#2E9E72"/><stop offset="1" stop-color="#5B3E96"/>
                  </linearGradient></defs>
                  <circle cx="100" cy="100" r="55" stroke="url(#g5)" stroke-width="6" fill="none" opacity="0.5"/>
                  <path d="M100 70c-14 0-26 10-26 24s26 36 26 36 26-22 26-36-12-24-26-24Z" fill="url(#g5)"/>
                </svg>
              </div>
              <div class="slide-text">
                <span class="slide-tag">Tema 5 de 5</span>
                <h3>Autocuidado</h3>
                <p>Es el conjunto de hábitos que sostienen nuestra salud mental día a día: dormir bien, moverse, mantener vínculos cercanos y poner límites. No reemplaza la ayuda profesional cuando se necesita, pero es la base que hace más fácil pedirla y sostenerla.</p>
              </div>
            </div>

          </div>
        </div>

        <div class="carousel-controls">
          <button class="car-btn" id="carPrev" aria-label="Tema anterior">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M15 6l-6 6 6 6"/></svg>
          </button>
          <div class="car-dots" id="carDots"></div>
          <button class="car-btn" id="carNext" aria-label="Tema siguiente">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 6l6 6-6 6"/></svg>
          </button>
        </div>
      </div>
    </div>
  </section>

  <section id="equipo">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Equipo</span>
        <h2>Quiénes están detrás de Equilibria</h2>
        <p>Un equipo de proyecto de grado trabajando en información, bienestar e inteligencia artificial aplicada a la salud mental.</p>
      </div>
      <div class="team-grid">
        <div class="member">
          <div class="member-photo">
            <div class="member-photo-inner">
              <span class="placeholder">Foto<br>integrante 1</span>
            </div>
          </div>
          <h3>Juan David Valencia Daza</h3>
          <div class="role">Rol en el proyecto</div>
        </div>

        <div class="member">
          <div class="member-photo">
            <div class="member-photo-inner">
              <span class="placeholder">Foto<br>integrante 2</span>
            </div>
          </div>
         <h3> Susana Gomez Molano</h3>
        <div   div class="role">Rol en el proyecto</div>
        </div>
           <div class="member-photo-inner">
           <div class="member">
          <div class="member-photo">
            <span class="placeholder">Foto<br>integrante 3</span>
            </div>
          </div>
          <h3>Miguel Angel Tabares Ospina</h3>
          <div class="role">Rol en el proyecto</div>
        </div>
        
        
           <div class="member-photo-inner">
           <div class="member">
          <div class="member-photo">
            <span class="placeholder">Foto<br>integrante 4</span>
            </div>
          </div>
                    <h3>Thomas Gonzales Pulido</h3>
          <div class="role">Rol en el proyecto</div>

      </div>
    </div>



  </section>






  <section id="contacto">
    <div class="wrap">
      <div class="cta">
        <div>
          <h2>¿Quieres saber más sobre nuestro proyecto?</h2>
          <p>Escríbenos si quieres saber más sobre Equilibria o compartir tu experiencia.</p>
        </div>
        <a class="btn-primary" href="mailto:equipo@equilibria.ai">Escribir al equipo</a>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="wrap foot-grid">
    <div class="brand" style="font-size:1.05rem;"><span class="brand-mark" style="width:22px;height:22px;"></span>Equilibria</div>
    <p class="foot-note">Proyecto de grado — Equilibria comparte información sobre salud mental. No reemplaza el diagnóstico ni el acompañamiento de un profesional.</p>
  </div>
</footer>

<script>
(function () {
  var track = document.getElementById('carouselTrack');
  var slides = track.children;
  var dotsWrap = document.getElementById('carDots');
  var prevBtn = document.getElementById('carPrev');
  var nextBtn = document.getElementById('carNext');
  var index = 0;

  for (var i = 0; i < slides.length; i++) {
    var dot = document.createElement('button');
    dot.className = 'car-dot' + (i === 0 ? ' active' : '');
    dot.setAttribute('aria-label', 'Ir al tema ' + (i + 1));
    dot.addEventListener('click', (function (n) { return function () { goTo(n); }; })(i));
    dotsWrap.appendChild(dot);
  }
  var dots = dotsWrap.children;

  function goTo(n) {
    index = (n + slides.length) % slides.length;
    track.style.transform = 'translateX(-' + (index * 100) + '%)';
    for (var i = 0; i < dots.length; i++) {
      dots[i].classList.toggle('active', i === index);
    }
  }

  prevBtn.addEventListener('click', function () { goTo(index - 1); });
  nextBtn.addEventListener('click', function () { goTo(index + 1); });

  var startX = null;
  track.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', function (e) {
    if (startX === null) return;
    var dx = e.changedTouches[0].clientX - startX;
    if (Math.abs(dx) > 40) { goTo(index + (dx < 0 ? 1 : -1)); }
    startX = null;
  }, { passive: true });

  document.querySelector('.carousel-shell').addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') goTo(index - 1);
    if (e.key === 'ArrowRight') goTo(index + 1);
  });
})();
</script>

</body>
</html>