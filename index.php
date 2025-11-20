<?php
// Conexão com o banco
$host = 'localhost';
$dbname = 'turismo';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Busca pontos turísticos para o carrossel (limite de 5) COM FOTOS
    $sql_atrativos = "SELECT idPontos_turisticos, Nome, Descricao, Endereco, Foto 
                     FROM Pontos_turisticos 
                     ORDER BY idPontos_turisticos ASC LIMIT 5";
    $stmt_atrativos = $pdo->prepare($sql_atrativos);
    $stmt_atrativos->execute();
    $destaques = $stmt_atrativos->fetchAll(PDO::FETCH_ASSOC);
    
    // Busca as 6 primeiras lojas
    $sql_lojas = "SELECT Nome, Imagem FROM Estabelecimento ORDER BY idEstabelecimentos ASC LIMIT 6";
    $stmt_lojas = $pdo->prepare($sql_lojas);
    $stmt_lojas->execute();
    $lojas = $stmt_lojas->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $destaques = [];
    $lojas = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Turismo • Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
  
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
  <header>
    <div class="container nav">
      <div class="brand">
        <!-- Link para home -->
        <a href="../index.php" aria-label="Página inicial">
          <img src="imagens/Logos/apaixone-se.png" alt="Botucatu Apaixone-se">
        </a>
      </div>
      <div class="actions">
        <a href=".auth/cadastro.php" class="btn btn-outline">Registre-se</a>
        <a href=".auth/login.php" class="btn btn-solid">Entrar</a>
      </div>
    </div>
  </header>

  <!-- Navbar -->
  <nav class="subnav" role="navigation" aria-label="Navegação principal">
    <div class="container subnav-inner">
      <!-- Link direto para atrativos.php -->
      <a href=".init/atrativos.php" class="subnav-item">Atrativos participantes <span class="chev">⌄</span></a>
      <a href=".init/lojas.php" class="subnav-item">Lojas participantes <span class="chev">⌄</span></a>
      <a href=".init/rankingsimple.php" class="subnav-item">Ranking de Usuários <span class="chev">⌄</span></a>
    </div>
  </nav>

  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <h1>Transforme seu lazer em descontos!</h1>
      <p>Aproveite seus passeios para ganhar pontos</p>
    </div>
  </section>

  <!-- Seção Como Funciona -->
  <section class="como-funciona" id="como-funciona">
    <div class="cf-inner">
      <div class="cf-header">
        <span class="cf-eyebrow">Como Participar</span>
        <h2 class="cf-title">Ganhe pontos em passeios e troque por descontos</h2>
        <p class="cf-sub">
          Visite os atrativos participantes, escaneie os QR Codes e acumule pontos na sua conta.
          Depois, é só trocar por descontos em lojas parceiras e disputar o ranking municipal.
        </p>
      </div>

      <div class="cf-steps">
        <!-- Step 1 -->
        <article class="cf-step">
          <div class="cf-top">
            <div class="cf-badge">1</div>
            <div class="cf-icon" aria-hidden="true">
              <!-- QR Code Icon -->
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <rect x="3" y="3" width="6" height="6" rx="1"></rect>
                <rect x="15" y="3" width="6" height="6" rx="1"></rect>
                <rect x="3" y="15" width="6" height="6" rx="1"></rect>
                <path d="M15 15h2v2h-2zM19 15h2v2h-2zM17 19h4"></path>
              </svg>
            </div>
            <h3 class="cf-title-sm">Escaneie o QR Code</h3>
          </div>
          <p class="cf-text">
            Em cada ponto turístico há um <strong>totem com QR Code</strong>. Use o celular para escanear e registrar sua visita.
          </p>
        </article>

        <!-- Step 2 -->
        <article class="cf-step">
          <div class="cf-top">
            <div class="cf-badge">2</div>
            <div class="cf-icon" aria-hidden="true">
              <!-- Points Icon -->
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M8 12h8M12 8v8"></path>
              </svg>
            </div>
            <h3 class="cf-title-sm">Ganhe Pontos</h3>
          </div>
          <p class="cf-text">
            Cada check-in concede <strong>pontos</strong> que são somados automaticamente na sua conta do programa.
          </p>
        </article>

        <!-- Step 3 -->
        <article class="cf-step">
          <div class="cf-top">
            <div class="cf-badge">3</div>
            <div class="cf-icon" aria-hidden="true">
              <!-- Voucher Icon -->
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <rect x="3" y="6" width="18" height="12" rx="2"></rect>
                <path d="M7 6v12M17 6v12M9 10l6 4M15 10l-6 4"></path>
              </svg>
            </div>
            <h3 class="cf-title-sm">Troque por Descontos</h3>
          </div>
          <p class="cf-text">
            Utilize seus pontos para <strong>resgatar descontos</strong> em estabelecimentos participantes.
          </p>
        </article>

        <!-- Step 4 -->
        <article class="cf-step">
          <div class="cf-top">
            <div class="cf-badge">4</div>
            <div class="cf-icon" aria-hidden="true">
              <!-- Trophy Icon -->
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <path d="M8 21h8M12 17v4"></path>
                <path d="M7 4h10v5a5 5 0 0 1-10 0V4z"></path>
                <path d="M5 6H3a4 4 0 0 0 4 4"></path>
                <path d="M19 6h2a4 4 0 0 1-4 4"></path>
              </svg>
            </div>
            <h3 class="cf-title-sm">Suba no Ranking</h3>
          </div>
          <p class="cf-text">
            Quanto mais você participa, <strong>mais alto</strong> fica no ranking municipal e desbloqueia vantagens.
          </p>
        </article>
      </div>

      <div class="cf-cta">
        <!-- Link para atrativos.php -->
        <a class="btn-cta" href=".init/atrativos.php">Começar agora</a>
      </div>
    </div>
  </section>

  <!-- ATRATIVOS DE DESTAQUE -->
  <section class="atrativos" id="atrativos">
    <div class="wrap">
      <h2 class="titulo">Atrativos de destaque</h2>

      <div class="slider" data-slider>
        <button class="arrow prev" data-prev aria-label="Anterior">❮</button>
        <div class="track" data-track>
          <!-- Slides dinâmicos do PHP -->
          <?php if (!empty($destaques)): ?>
            <?php foreach ($destaques as $destaque): 
              // Define a imagem do atrativo
              $imagem_atrativo = !empty($destaque['Foto']) ? 'imagens/Atrativos/' . htmlspecialchars($destaque['Foto']) : 'imagens/Atrativos/default.jpg';
            ?>
              <div class="slider" data-slider>
                <div class="slide-image" style="background-image: url('<?= $imagem_atrativo ?>')"></div>
                <div class="slide-content">
                  <h3><?= htmlspecialchars($destaque['Nome']) ?></h3>
                  <p><?= htmlspecialchars($destaque['Descricao']) ?></p>
                  <a href=".init/atrativos.php?destaque=<?= $destaque['idPontos_turisticos'] ?>" class="btn-slide">Ver Detalhes</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <!-- Fallback estático se o banco falhar -->
            <div class="slider" data-slider>
              <div class="slide-image" style="background-image: url('imagens/Atrativos/cachoeira-marta.jpg')"></div>
              <div class="slide-content">
                <h3>Parque Natural Municipal da Cachoeira da Marta</h3>
                <p>Trilhas e cachoeira com natureza preservada</p>
                <a href=".init/atrativos.php" class="btn-slide">Ver Detalhes</a>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <button class="arrow next" data-next aria-label="Próximo">❯</button>
      </div>

      <div class="callout">
        <span class="chev"></span>
        <div class="nome" id="nome-atrativo">Carregando…</div>
        <span class="chev"></span>
      </div>
    </div>
  </section>

  <!-- LOJAS PARTICIPANTES -->
  <section class="lojas" id="lojas" aria-label="Lojas participantes">
    <div class="faixa-titulo">Alguns estabelecimentos que apoiam o projeto</div>
    <div class="grid">
      <?php if (!empty($lojas)): ?>
        <?php foreach ($lojas as $loja): ?>
          <div class="loja-card">
            <img src="imagens/Lojas/<?= htmlspecialchars($loja['Imagem']) ?>" alt="<?= htmlspecialchars($loja['Nome']) ?>">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- Fallback estático se o banco falhar -->
        <div class="loja-card"><img src="imagens/Lojas/tabajara.png" alt="Churrascaria Tabajara"></div>
        <div class="loja-card"><img src="imagens/Lojas/academia-brazil.png" alt="Academia Brazil"></div>
        <div class="loja-card"><img src="imagens/Lojas/berimbau.png" alt="Berimbau"></div>
        <div class="loja-card"><img src="imagens/Lojas/havan.png" alt="Havan"></div>
        <div class="loja-card"><img src="imagens/Lojas/pizza-semiao.png" alt="Pizza Frita Semiio Botucatu"></div>
      <?php endif; ?>
    </div>
  </section>

<section class="more-info-section">
  <h2 class="more-info-title">Para outras informações visite o site:</h2>
  <div class="more-info-box">
    <a href="https://turismo.botucatu.sp.gov.br" target="_blank">
      https://turismo.botucatu.sp.gov.br
    </a>
  </div>
</section>

  <footer class="rodape">
    <div class="wrap">
      <div class="rodape-card">
        <img src="imagens/Logos/brasao-prefeitura.png" alt="Prefeitura de Botucatu">
        <div class="faixa-titulo">PREFEITURA: Praça Professor Pedro Torres, nº 100 - Centro - CEP: 18600-900</div>
        <div class="faixa-titulo">ATENDIMENTO: Segunda à Sexta, das 08h às 16h30</div>
        <div class="faixa-titulo">Telefone: (14) 3811-1400</div>
      </div>
    </div>
  </footer>

  <script src="assets/js/main.js"></script>
</body>
</html>