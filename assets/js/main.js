

// Troque os caminhos pelas suas imagens reais
const ATRATIVOS = [
  { titulo: 'Mirante Pedra do Índio', img: 'imagens/atrativos/mirante.jpg' },
  { titulo: 'Cachoeira da Marta',     img: 'imagens/atrativos/cachoeira-marta.jpg' },
  { titulo: 'Voo de Parapente',       img: 'imagens/atrativos/parapente.jpeg' },
  { titulo: 'Parque Municipal',       img: 'imagens/atrativos/parque.jpg' },
  { titulo: 'Pinacoteca',             img: 'imagens/atrativos/pinacoteca.jpg' },
  { titulo: 'Catedral Basílica de SantAna', img: 'imagens/atrativos/catedral.jpg' },
];

const track = document.querySelector('[data-track]');
const nome  = document.getElementById('nome-atrativo');

// monta os cards
ATRATIVOS.forEach(a => {
  const card = document.createElement('article');
  card.className = 'card';
  card.innerHTML = `
    <div class="cover" style="background-image:url('${a.img}')"></div>
    <div class="body"><h3>${a.titulo}</h3></div>
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
const obs = new IntersectionObserver(entries => {
  let best = null, bestRatio = 0;
  entries.forEach(e => {
    if (e.intersectionRatio > bestRatio) { bestRatio = e.intersectionRatio; best = e.target; }
  });
  if (best) {
    const h3 = best.querySelector('h3');
    if (h3) nome.textContent = h3.textContent;
  }
}, { root: track, threshold: [0.6, 0.8, 1] });

Array.from(track.children).forEach(el => obs.observe(el));

