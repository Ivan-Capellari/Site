<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Turismo • Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    :root {
      --brand: #2463EB;
      --accent: #13B38B;
      --site-bg: #FFFFFF;       /* fundo do site */
      --text: #333333;
      --container: 1180px;
      --info-bg: #AFC3E0;       /* azul da faixa "Como Funciona" */
      /* Cores da barra de navegação (inspirado no site) */
      --nav-dark: #1d2a3a;      /* azul petróleo bem escuro */
      --nav-dark-2: #15202c;    /* tonalidade para gradiente */
      --nav-hover: #2b92f1;     /* destaque de hover/foco */
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Helvetica Neue", sans-serif;
      color: var(--text);
      background: var(--site-bg);
      line-height: 1.9;
    }

    a { color: inherit; text-decoration: none; }
    .container { width: min(100% - 32px, var(--container)); margin-inline: auto; }

    /* ===== Cabeçalho Branco fixo ===== */
    header {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 40;
      background: #fff;
      border-bottom: 1px solid #e6e9f1;
      box-shadow: 0 1px 0 rgba(15, 23, 42, 0.04);
    }
    .nav {
      display: flex; align-items: center; justify-content: space-between;
      height: 80px; padding: 0 16px;
    }
    .brand img { height: 80px; width: auto; display: block; }
    .actions { display: flex; align-items: center; gap: 10px; }
    .btn {
      padding: 10px 18px; border-radius: 999px; font-weight: 700;
      border: 2px solid transparent; cursor: pointer; transition: .2s ease;
    }
    .btn-outline { border-color: #27a4e0; color: #27a4e0; background: transparent; }
    .btn-outline:hover { background: rgba(39,164,224,.08); }
    .btn-solid { background: #27a4e0; color: #fff; }
    .btn-solid:hover { filter: brightness(1.05); }

    /* ===== Navbar (estilo site) ===== */
    .subnav {
      position: fixed;
      top: 20; left: 0; right: 0;
      z-index: 40;
      background: linear-gradient(180deg, var(--nav-dark), var(--nav-dark-2));
      color: #fff;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      margin-top: 80px; /* altura do header fixo */
      box-shadow: 0 6px 14px rgba(0,0,0,.08);
    }
    .subnav-inner {
      display: flex; justify-content: center; align-items: center;
      gap: 56px; padding: 12px 0;
      overflow-x: auto; scrollbar-width: none;
    }
    .subnav-inner::-webkit-scrollbar { display: none; }

    .subnav-item {
      display: grid; place-items: center;
      text-transform: uppercase;
      font-weight: 800; letter-spacing: .03em;
      font-size: .95rem;
      padding: 6px 10px;
      position: relative;
      opacity: .95;
      transition: color .15s ease, opacity .15s ease;
      white-space: nowrap;
    }
    .subnav-item span.chev { font-size: 16px; line-height: 1; margin-top: 3px; opacity: .8; }
    .subnav-item::after {
      content: ""; position: absolute; left: 0; right: 0; bottom: -12px;
      height: 3px; background: transparent; border-radius: 2px;
      transition: background-color .2s ease;
    }
    .subnav-item:hover,
    .subnav-item:focus-visible { color: var(--nav-hover); opacity: 1; }
    .subnav-item:hover::after,
    .subnav-item:focus-visible::after { background: var(--nav-hover); }

    /* ===== Hero Section ===== */
    .hero {
      position: relative;
      background: url('imagens/home-22.png') center top no-repeat;
      background-size: contain;      /* menos zoom, mostra bordas */
      background-color: #ffffff;     /* garante laterais brancas */
      height: 900px;
      display: flex; align-items: flex-start; justify-content: flex-start;
      color: white; margin-top: 0;
    }
    .hero-content {
      position: relative; z-index: 2; max-width: 600px;
      padding: 0 24px; margin-top: 300px;
    }
    .hero h1 {
      font-size: 2.6rem; font-weight: 800; color: #FFD400;
      margin: 5 0 12px; text-align: left;
      margin-left: -400px; letter-spacing: -0.02em;
      text-shadow: 0 6px 18px rgba(0,0,0,0.45), 0 2px 8px rgba(0,0,0,0.35);
      animation: slideIn 1s ease forwards;
    }
    .hero p {
      font-size: 1.5rem; color: #fff; margin: 0; text-align: left;
      margin-left: -400px; text-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }
    @keyframes slideIn { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }

    /* ===== Seção Como Funciona ===== */
    .como-funciona {
      background: var(--info-bg); color: #fff; text-align: center;
      padding: 42px 0; margin-top: 40px;
      border-top: 8px solid #fff; border-bottom: 8px solid #fff;
    }
    .como-funciona .wrap { width: min(100% - 32px, var(--container)); margin: 0 auto; }
    .como-funciona h2 { margin: 0 0 18px; font-weight: 800; font-size: clamp(1.6rem, 3vw, 2rem); letter-spacing: .2px; }
    .como-funciona p { margin: 0 auto; max-width: 900px; font-size: clamp(1rem, 1.4vw, 1.15rem); line-height: 1.8; }

    /* ===== ATRATIVOS DE DESTAQUE (carrossel) ===== */
    .atrativos {
      margin-top: 36px;
      background: #54a54a;                 /* verde da faixa */
      padding: 22px 0 32px;
      position: relative;
      box-shadow: 0 -6px 14px rgba(0,0,0,.06) inset;
    }
    .atrativos .wrap {
      width: min(100% - 32px, var(--container));
      margin: 0 auto;
    }
    .atrativos .titulo {
      margin: 0 0 14px;
      text-align: center;
      color: #111;
      font-weight: 800;
      font-size: clamp(1.6rem, 3vw, 2.2rem);
      letter-spacing: .02em;
      text-shadow: 0 2px 0 rgba(255,255,255,.65);
    }

    .slider {
      position: relative;
      overflow: hidden;
      border-radius: 14px;
      padding: 0 56px;                    /* espaço para as setas */
    }
    .track {
      display: grid;
      grid-auto-flow: column;
      grid-auto-columns: calc(33.333% - 12px); /* 3 cards por vez no desktop */
      gap: 18px;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      padding: 6px;
      scrollbar-width: none;
    }
    .track::-webkit-scrollbar { display: none; }

    .card {
      scroll-snap-align: start;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 12px 24px rgba(0,0,0,.18);
      overflow: hidden;
      display: grid;
      grid-template-rows: 170px auto;
    }
    .card .cover {
      background: #ccc center/cover no-repeat;
    }
    .card .body {
      padding: 10px 12px;
      display: grid;
      align-items: center;
    }
    .card h3 {
      margin: 0;
      font-size: 1rem;
      color: #1a1a1a;
      font-weight: 700;
    }

    .callout {
      margin-top: 14px;
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      color: #fff;
      gap: 8px;
    }
    .callout .chev {
      font-size: 22px;
      opacity: .9;
    }
    .callout .nome {
      background: rgba(0,0,0,.18);
      border: 1px solid rgba(255,255,255,.35);
      padding: 10px 18px;
      border-radius: 999px;
      font-weight: 700;
      letter-spacing: .02em;
      box-shadow: 0 8px 16px rgba(0,0,0,.18);
    }

    .slider .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 40px; height: 40px;
      border-radius: 50%;
      border: 1px solid rgba(255,255,255,.5);
      background: rgba(0,0,0,.25);
      color: #fff;
      display: grid; place-items: center;
      cursor: pointer;
      user-select: none;
      backdrop-filter: blur(4px);
    }
    .slider .arrow:hover { background: rgba(0,0,0,.4); }
    .slider .prev { left: 8px; }
    .slider .next { right: 8px; }

    @media (max-width: 1024px) {
      .track { grid-auto-columns: calc(50% - 12px); }
    }
    @media (max-width: 640px) {
      .slider { padding: 0 44px; }
      .track { grid-auto-columns: 100%; }
    }

    main { margin-top: 0; background: #fff; }

    /* ===== Responsivo rápido ===== */
    @media (max-width: 900px) {
      .subnav-inner { gap: 28px; }
      .hero { height: 520px; }
      .hero-content { margin-top: 110px; }
      .hero h1, .hero p { margin-left: 0; }
    }
  </style>
</head>
<body>
  <header>
    <div class="container nav">
      <div class="brand">
        <img src="imagens/apaixone-se.png" alt="Botucatu Apaixone-se">
      </div>
      <div class="actions">
        <button class="btn btn-outline">Registre-se</button>
        <button class="btn btn-solid">Entrar</button>
      </div>
    </div>
  </header>

  <!-- Navbar no estilo do site -->
  <nav class="subnav" role="navigation" aria-label="Navegação principal">
    <div class="container subnav-inner">
      <a href="#atrativos" class="subnav-item">Atrativos participantes <span class="chev">⌄</span></a>
      <a href="#lojas" class="subnav-item">Lojas participantes <span class="chev">⌄</span></a>
      <a href="#ranking" class="subnav-item">Ranking de Usuários <span class="chev">⌄</span></a>
    </div>
  </nav>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <h1>Transforme seu lazer em descontos!</h1>
      <p>Aproveite seus passeios para ganhar pontos</p>
    </div>
  </section>

  <!-- Faixa azul "Como Funciona" -->
  <section class="como-funciona">
    <div class="wrap">
      <h2>Como Funciona:</h2>
      <p>
        Em cada ponto turístico participante do game, há um totem com um qrcode,
        que ao ser escaneado pelo seu celular, te garante pontos na sua conta.
        <br>
        Por meio dos pontos, você pode resgatar descontos em estabelecimentos
        participantes do game, além de participar de um ranking municipal.
      </p>
    </div>
  </section>

  <!-- ATRATIVOS DE DESTAQUE (carrossel) -->
  <section class="atrativos" id="atrativos">
    <div class="wrap">
      <h2 class="titulo">Atrativos de destaque</h2>

      <div class="slider" data-slider>
        <button class="arrow prev" data-prev aria-label="Anterior">❮</button>
        <div class="track" data-track>
          <!-- Cards serão injetados via JS -->
        </div>
        <button class="arrow next" data-next aria-label="Próximo">❯</button>
      </div>

      <div class="callout">
        <span class="chev">«</span>
        <div class="nome" id="nome-atrativo">Carregando…</div>
        <span class="chev">»</span>
      </div>
    </div>
  </section>

  <main>
    <!-- Conteúdo principal da página -->
  </main>

  <!-- JS do carrossel -->
  <script>
    // Troque os caminhos pelas suas imagens reais
    const ATRATIVOS = [
      { titulo: 'Mirante Pedra do Índio', img: 'imagens/atrativos/mirante.jpg' },
      { titulo: 'Cachoeira da Marta',     img: 'imagens/atrativos/cachoeira-marta.jpg' },
      { titulo: 'Voo de Parapente',       img: 'imagens/atrativos/parapente.jpeg' },
      { titulo: 'Parque Municipal',       img: 'imagens/atrativos/parque.jpg' },
      { titulo: 'Pinacoteca',       img: 'imagens/atrativos/pinacoteca.jpg' },
      { titulo: 'Catedral Basílica de SantAna',       img: 'imagens/atrativos/catedral.jpg' },
    ];

    const track = document.querySelector('[data-track]');
    const nome  = document.getElementById('nome-atrativo');

    // monta os cards
    ATRATIVOS.forEach((a) => {
      const card = document.createElement('article');
      card.className = 'card';
      card.innerHTML = `
        <div class="cover" style="background-image:url('${a.img}')"></div>
        
      `;
      card.addEventListener('mouseenter', () => nome.textContent = a.titulo);
      card.addEventListener('focusin',    () => nome.textContent = a.titulo);
      track.appendChild(card);
    });

    // nome inicial
    nome.textContent = ATRATIVOS[0]?.titulo || 'Atrativo';

    // navegação (setas)
    const slider  = document.querySelector('[data-slider]');
    const prevBtn = slider.querySelector('[data-prev]');
    const nextBtn = slider.querySelector('[data-next]');

    function cardWidth() {
      const first = track.querySelector('.card');
      if (!first) return 320;
      const style = getComputedStyle(track);
      const gap = parseFloat(style.columnGap || style.gap || 18);
      return first.getBoundingClientRect().width + gap;
    }

    prevBtn.addEventListener('click', () => {
      track.scrollBy({ left: -cardWidth(), behavior: 'smooth' });
    });
    nextBtn.addEventListener('click', () => {
      track.scrollBy({ left:  cardWidth(), behavior: 'smooth' });
    });

    // Observa qual card está mais visível para atualizar o nome automaticamente
    const obs = new IntersectionObserver((entries) => {
      let best = null;
      let bestRatio = 0;
      entries.forEach(e => {
        if (e.intersectionRatio > bestRatio) { bestRatio = e.intersectionRatio; best = e.target; }
      });
      if (best) {
        const h3 = best.querySelector('h3');
        if (h3) nome.textContent = h3.textContent;
      }
    }, { root: track, threshold: [0.6, 0.8, 1] });

    Array.from(track.children).forEach(el => obs.observe(el));
  </script>
</body>
</html>
