<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BoTour • Conquistas</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/conquista.css">
</head>
<script>
  (function () {
    let lastY = window.scrollY;
    const TH = 12; // histerese: evita ficar piscando
    function onScroll() {
      const y = window.scrollY;
      if (y > lastY + TH) {
        // rolando para baixo -> esconde header
        document.body.classList.add('header-hidden');
      } else if (y < lastY - TH) {
        // rolando para cima -> mostra header
        document.body.classList.remove('header-hidden');
      }
      lastY = y;
    }
    window.addEventListener('scroll', onScroll, { passive: true });
  })();
</script>

<body>
  <!-- Cabeçalho padrão -->
  <header>
    <div class="container nav">
      <div class="brand">
        <a href="../index.php" aria-label="Página inicial">
          <img src="../imagens/Logos/apaixone-se.png" alt="Botucatu Apaixone-se">
        </a>
      </div>
      <div class="actions">
        <a href="../.auth/cadastro.php" class="btn btn-outline">Registre-se</a>
        <a href="../.auth/login.php" class="btn btn-solid">Entrar</a>
      </div>
    </div>
  </header>

  <!-- Subnav padrão -->
  <nav class="subnav" role="navigation" aria-label="Navegação principal">
    <div class="container subnav-inner">
      <a href=".init/atrativos.php" class="subnav-item">Atrativos participantes <span class="chev">⌄</span></a>
      <a href=".init/lojas.php" class="subnav-item">Lojas participantes <span class="chev">⌄</span></a>
      <a href=".init/rankingsimple.php" class="subnav-item">Ranking de Usuários <span class="chev">⌄</span></a>
    </div>
  </nav>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <h1>Pontos Turísticos de Botucatu</h1>
      <p>Descubra as belezas naturais e culturais da nossa cidade</p>
    </div>
  </section>



<section class="vatrativos-section">
  <div class="vatrativos-container">
    
    <!-- Cabeçalho com ícone e pontuação (AGORA É DIV, NÃO MAIS <header>) -->
    <div class="vatrativos-header">
      <div class="vatrativos-user-icon">
        <span class="vatrativos-user-circle"></span>
      </div>
      <p class="vatrativos-pontos">
        <span>Seus Pontos:</span> 72
      </p>
    </div>

    <!-- Lista de atrativos -->
    <ul class="vatrativos-list">

      <!-- Card 1 -->
      <li class="vatrativo-card">
        <div class="vatrativo-img-wrapper">
          <img src="../assets/img/pedra-do-indio.jpg" alt="Pedra do Índio">
        </div>

        <div class="vatrativo-info">
          <div class="vatrativo-topline">
            <div>
              <h3 class="vatrativo-nome">Pedra do índio</h3>
              <p class="vatrativo-status vatrativo-status--ok">Check! ✔</p>
            </div>
            <span class="vatrativo-dot vatrativo-dot--verde"></span>
          </div>

          <p class="vatrativo-meta"><span>Visitou em:</span> 18/05/2025</p>
          <p class="vatrativo-meta"><span>Ganhou</span> 8 Pontos</p>
        </div>
      </li>

      <!-- Card 2 -->
      <li class="vatrativo-card">
        <div class="vatrativo-img-wrapper">
          <img src="../assets/img/cachoeira-marta.jpg" alt="Cachoeira da Marta">
        </div>

        <div class="vatrativo-info">
          <div class="vatrativo-topline">
            <div>
              <h3 class="vatrativo-nome">Cachoeira da Marta</h3>
              <p class="vatrativo-status vatrativo-status--ok">Check! ✔</p>
            </div>
            <span class="vatrativo-dot vatrativo-dot--verde"></span>
          </div>

          <p class="vatrativo-meta"><span>Visitou em:</span> 11/03/2025</p>
          <p class="vatrativo-meta"><span>Ganhou</span> 6 Pontos</p>
        </div>
      </li>

      <!-- Card 3 -->
      <li class="vatrativo-card">
        <div class="vatrativo-img-wrapper">
          <img src="../assets/img/pinacoteca.jpg" alt="Pinacoteca">
        </div>

        <div class="vatrativo-info">
          <div class="vatrativo-topline">
            <div>
              <h3 class="vatrativo-nome">Pinacoteca</h3>
              <p class="vatrativo-status vatrativo-status--pendente">Ainda não foi</p>
            </div>
            <span class="vatrativo-dot vatrativo-dot--amarelo"></span>
          </div>

          <p class="vatrativo-meta"><span>Visitou em:</span> 23/05/2025</p>
          <p class="vatrativo-meta"><span>Ganhou</span> 11 Pontos</p>
        </div>
      </li>

      <!-- Exemplo adicional -->
      <li class="vatrativo-card">
        <div class="vatrativo-img-wrapper">
          <img src="../assets/img/exemplo.jpg" alt="Outro atrativo">
        </div>

        <div class="vatrativo-info">
          <div class="vatrativo-topline">
            <div>
              <h3 class="vatrativo-nome">Outro Atrativo</h3>
              <p class="vatrativo-status vatrativo-status--ok">Check! ✔</p>
            </div>
            <span class="vatrativo-dot vatrativo-dot--verde"></span>
          </div>

          <p class="vatrativo-meta"><span>Visitou em:</span> 01/06/2025</p>
          <p class="vatrativo-meta"><span>Ganhou</span> 5 Pontos</p>
        </div>
      </li>

    </ul>

    <!-- Botão Mostrar Mais -->
    <div class="vatrativos-more">
      <button id="btnMostrarMais" class="btn-mostrar-mais" type="button">
        <span>Mostrar mais</span>
        <span class="btn-arrow">⌄</span>
      </button>
    </div>
  </div>
</section>


<!-- Gabriel S. lindo clone o corpo do 'lojas.php' aqui, já que vai ser muito parecido -->




<section class="more-info-section">
  <h2 class="more-info-title">Para outras informações visite o site:</h2>
  <div class="more-info-box">
    <a href="https://turismo.botucatu.sp.gov.br" target="_blank">
      https://turismo.botucatu.sp.gov.br
    </a>
  </div>
</section>

  <!-- Rodapé padrão -->
  <footer class="rodape">
    <div class="wrap">
      <div class="rodape-card">
        <img src="../imagens/Logos/brasao-prefeitura.png" alt="Prefeitura de Botucatu">
        <div class="faixa-titulo">
          PREFEITURA: Praça Professor Pedro Torres, nº 100 - Centro - CEP: 18600-900
        </div>
        <div class="faixa-titulo">
          ATENDIMENTO: Segunda à Sexta, das 08h às 16h30
        </div>
        <div class="faixa-titulo">
          Telefone: (14) 3811-1400
        </div>
      </div>
    </div>
  </footer>

  <script src="../assets/js/vatrativos.js"></script>

</body>
</html>
