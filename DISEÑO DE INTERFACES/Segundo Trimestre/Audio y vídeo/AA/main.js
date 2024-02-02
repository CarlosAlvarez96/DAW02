const reproductor = document.querySelector('.reproductor');
const audio = document.querySelector('audio');
const playPauseBtn = document.querySelector('.play-pause');
const tiempoActual = document.querySelector('.tiempo-actual');
const nombreFichero = document.querySelector('.nombre-fichero');

let tiempoReproduccion = 0;

function cargarAudio(archivo) {
  if (!archivo) return;

  nombreFichero.textContent = archivo.name;
  audio.src = URL.createObjectURL(archivo);
  audio.load();
  audio.addEventListener('canplay', () => {
    tiempoReproduccion = audio.duration;
    actualizarTiempo();
  });
}

function reproducir() {
  reproductor.classList.remove('pausado');
  audio.play();
  intervalo = setInterval(actualizarTiempo, 1000);
}

function pausar() {
  reproductor.classList.add('pausado');
  audio.pause();
  clearInterval(intervalo);
}

function actualizarTiempo() {
  tiempoActual.textContent = formatearTiempo(audio.currentTime);
}

function formatearTiempo(segundos) {
  const minutos = Math.floor(segundos / 60);
  const segundosRestantes = Math.floor(segundos % 60);
  return `<span class="math-inline">\{minutos\.toString\(\)\.padStart\(2, '0'\)\}\:</span>{segundosRestantes.toString().padStart(2, '0')}`;
}

// Eventos

playPauseBtn.addEventListener('click', () => {
  if (audio.paused) {
    reproducir();
  } else {
    pausar();
  }
});

audio.addEventListener('ended', () => {
  pausar();
  tiempoReproduccion = 0;
  actualizarTiempo();
});

// Carga de archivo inicial
