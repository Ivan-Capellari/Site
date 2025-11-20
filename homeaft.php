<?php
// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../.auth/login.php');
    exit;
}

// Configurações do banco (se precisar de mais dados)
$host = 'localhost';
$dbname = 'turismo';
$username = 'root';
$password = '';

// Buscar dados atualizados do usuário se necessário
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT Nome, Apelido, Cidade, Pontuacao, Ranking FROM Usuario WHERE idUsuario = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($usuario) {
        $_SESSION['usuario_nome'] = $usuario['Nome'];
        $_SESSION['usuario_apelido'] = $usuario['Apelido'];
        $_SESSION['usuario_cidade'] = $usuario['Cidade'];
        $_SESSION['usuario_pontuacao'] = $usuario['Pontuacao'];
        $_SESSION['usuario_ranking'] = $usuario['Ranking'];
    }
    
} catch (PDOException $e) {
    // Em caso de erro, usar os dados da sessão
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Turismo • Home após login</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/homeaft.css">
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
      <a href="../index.php" aria-label="Página inicial">
        <img src="../imagens/Logos/apaixone-se.png" alt="Botucatu Apaixone-se">
      </a>
    </div>
    <div class="user-box">
      <span class="user-name">Olá, <?= htmlspecialchars($_SESSION['usuario_apelido'] ?? $_SESSION['usuario_nome'] ?? 'Usuário') ?></span>

      <a href="../.auth/perfil.php" class="perfil-link" aria-label="Perfil do usuário">
        <img src="../imagens/Logos/user.png" alt="Foto de perfil" class="perfil-foto">
      </a>
    </div>
    
  </div>
</header>

<nav class="subnav" role="navigation" aria-label="Navegação principal">
  <div class="container subnav-inner">
    <a href="../.init/atrativos.php" class="subnav-item">Atrativos participantes <span class="chev">⌄</span></a>
    <a href="../.init/lojas.php" class="subnav-item is-active">Lojas participantes <span class="chev">⌄</span></a>
    <a href="../.init/rankingsimple.php" class="subnav-item">Ranking de Usuários <span class="chev">⌄</span></a>
  </div>
</nav>

<!-- Hero com imagem de fundo -->
<section class="hero">
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <h1>Lojas Parceiras</h1>
    <p>Troque seus pontos por descontos especiais</p>
    <div class="user-info">
      <p><strong>Pontuação:</strong> <?= htmlspecialchars($_SESSION['usuario_pontuacao'] ?? '0') ?> pontos</p>
      <p><strong>Ranking:</strong> <?= htmlspecialchars($_SESSION['usuario_ranking'] ?? 'Iniciante') ?></p>
    </div>
  </div>
</section>

<!-- SESSÃO: NAVEGANDO PELAS OPÇÕES -->
<section class="aft-opcoes" id="opcoes">
  <div class="aft-inner">
    <div class="aft-header">
      <span class="aft-eyebrow">Navegando pelas opções</span>
      <h2 class="aft-title">Escolha por onde deseja começar</h2>
      <p class="aft-sub">
        Na opção <strong>Loja</strong> você pode obter mais informações e verificar os descontos disponíveis.
        Em <strong>Conquistas</strong> você visualiza todos os atrativos e a sua pontuação em cada um.
        Acompanhe ainda o <strong>Ranking</strong> para ver a pontuação de todos os participantes.
      </p>
    </div>

    <div class="aft-grid">
      <!-- Card Loja -->
      <a href="../.init/lojas.php" class="aft-card">
        <div class="aft-icon" aria-hidden="true">
          <!-- Ícone LOJA -->
          <svg viewBox="0 0 24 24">
            <path d="M4 10v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-9" />
            <path d="M3 10h18l-1.2-5.3A1 1 0 0 0 18.82 4H5.18a1 1 0 0 0-.98.7L3 10z" />
            <path d="M9 14h6v6H9z" />
          </svg>
        </div>
        <h3 class="aft-card-title">Loja</h3>
        <p class="aft-card-text">
          Consulte os parceiros e veja os descontos disponíveis para trocar com seus pontos.
        </p>
      </a>

      <!-- Card Conquistas -->
      <a href="../.init/atrativos.php" class="aft-card">
        <div class="aft-icon" aria-hidden="true">
          <!-- Ícone TROFÉU -->
          <svg viewBox="0 0 24 24">
            <path d="M8 21h8" />
            <path d="M12 17v4" />
            <path d="M7 4h10v5a5 5 0 0 1-10 0V4z" />
            <path d="M5 6H3a4 4 0 0 0 4 4" />
            <path d="M19 6h2a4 4 0 0 1-4 4" />
          </svg>
        </div>
        <h3 class="aft-card-title">Conquistas</h3>
        <p class="aft-card-text">
          Veja em quais atrativos você já passou, quantos pontos ganhou e quais ainda faltam visitar.
        </p>
      </a>

      <!-- Card Ranking -->
      <a href="../.init/rankingsimple.php" class="aft-card">
        <div class="aft-icon" aria-hidden="true">
          <!-- Ícone PÓDIO -->
          <svg viewBox="0 0 24 24">
            <path d="M4 18h4v-6H4z" />
            <path d="M10 18h4V4h-4z" />
            <path d="M16 18h4v-9h-4z" />
            <path d="M12 7l1.5-1V4" />
          </svg>
        </div>
        <h3 class="aft-card-title">Ranking</h3>
        <p class="aft-card-text">
          Acompanhe sua posição e compare sua pontuação com outros participantes do programa.
        </p>
      </a>
    </div>
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
      <img src="../imagens/Logos/brasao-prefeitura.png" alt="Prefeitura de Botucatu">
      <div class="faixa-titulo">PREFEITURA: Praça Professor Pedro Torres, nº 100 - Centro - CEP: 18600-900</div>
      <div class="faixa-titulo">ATENDIMENTO: Segunda à Sexta, das 08h às 16h30</div>
      <div class="faixa-titulo">Telefone: (14) 3811-1400</div>
    </div>
  </div>
</footer>

<script src="../assets/js/lojas.js"></script>
</body>
</html>