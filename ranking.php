<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BoTour • Ranking de Usuários</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/ranking.css">
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

  <!-- ======================= RANKING COMPLETO ======================= -->
  <main class="ranking-full-wrap">
    <!-- Faixa azul -->
    <div class="ranking-full-faixa">
      Confira sua posição no ranking:
    </div>

    <!-- Quadro principal -->
    <section class="ranking-full-card">
      <h2 class="ranking-full-title">Classificação</h2>

      <ul class="class-list">
        <!-- EXEMPLO 1 -->
        <li class="class-item">
          <div class="class-left">
            <img src="../imagens/usuarios/craudinho.jpg" alt="Craudinho" class="class-avatar">
            <div class="class-pos">1º</div>
          </div>

          <div class="class-right">
            <div class="class-topline">
              <span class="class-name">Craudinho</span>
              <span class="class-medal">🥇</span>
            </div>
            <p class="class-visitas">
              <strong>Visitas em destaque:</strong>
              Parque municipal, Pedra do Índio, Pinacoteca
            </p>
          </div>
        </li>

        <!-- EXEMPLO 2 -->
        <li class="class-item">
          <div class="class-left">
            <img src="../imagens/usuarios/jau-server.jpg" alt="Jaú Server" class="class-avatar">
            <div class="class-pos">2º</div>
          </div>

          <div class="class-right">
            <div class="class-topline">
              <span class="class-name">Jaú Server</span>
              <span class="class-medal">🥈</span>
            </div>
            <p class="class-visitas">
              <strong>Visitas em destaque:</strong>
              Cachoeira Marta, Pedra do Índio, Pinacoteca
            </p>
          </div>
        </li>

        <!-- daqui pra frente você repete o <li> via PHP com dados do banco -->
      </ul>
    </section>
  </main>
  <!-- ===================== FIM RANKING COMPLETO ===================== -->

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

  <script src="assets/js/main.js"></script>
</body>
</html>
