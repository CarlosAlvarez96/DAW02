function startRotation() {
    document.querySelector('.img').classList.add('rotating');
  }

  function stopRotation() {
    document.querySelector('.img').classList.remove('rotating');
  }

document.addEventListener('DOMContentLoaded', function () {
  const fileInput = document.getElementById('fileInput');
  const audioInput = document.getElementById('audioInput');
  const audioName = document.getElementById('audioName');
  const theAudio = document.querySelector("#myAudio");
  const playPauseBtn = document.getElementById("playPauseBtn");
  const playIcon = document.getElementById("playIcon");
  const progressBar = document.getElementById("progressBar");
  const currentTimeEl = document.getElementById("currentTime");
  const totalTimeEl = document.getElementById("totalTime");
  
  


  fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const fileName = file.name;
        audioInput.value = fileName;
        audioName.textContent = `Currently playing: ${fileName}`;
        theAudio.src = e.target.result;
        theAudio.load();
        updateTotalTime();
      };
      reader.readAsDataURL(file);
    }
  });

  function formatTime(time) {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
  }

  function updateProgressBar() {
    const currentTime = theAudio.currentTime;
    const duration = theAudio.duration;
    const progress = (currentTime / duration) * 100;

    progressBar.setAttribute("aria-valuenow", progress);
    progressBar.style.width = `${progress}%`;

    currentTimeEl.textContent = formatTime(currentTime);
  }

  function updateTotalTime() {
    const duration = theAudio.duration;
    totalTimeEl.textContent = formatTime(duration);
  }

  theAudio.addEventListener("timeupdate", updateProgressBar);
  theAudio.addEventListener("loadedmetadata", updateTotalTime);

  window.playPauseAudio = function () {
    if (theAudio.paused) {
      theAudio.play();
      playIcon.classList.remove("bi-play");
      playIcon.classList.add("bi-pause");
    } else {
      theAudio.pause();
      playIcon.classList.remove("bi-pause");
      playIcon.classList.add("bi-play");
    }
  };

  window.stopAudio = function () {
    theAudio.currentTime = 0;
    theAudio.pause();
    progressBar.setAttribute("aria-valuenow", 0);
    progressBar.style.width = "0%";
    currentTimeEl.textContent = "00:00";
  };

});