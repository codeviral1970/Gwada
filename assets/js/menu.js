(function () {
  'use strict';

let menuButton = document.querySelector("#menu-button");
let menuContainer = document.querySelector("#header-menu");
let menuButtonClose = document.querySelector("#menu-button-close-icon");
let menuButtonOpen = document.querySelector("#menu-button-open-icon");

menuButton.addEventListener("click", () => {
  menuContainer.classList.toggle("hidden");
  menuButtonOpen.classList.toggle("hidden");
  menuButtonClose.classList.toggle("hidden");
  document.body.classList.toggle("menu-shown");

});

  setTimeout(() => {
    const success = document.getElementById('success-message');
    if (success)
    {
      success.hidden = true;
    }
  }, 4000);

  setTimeout(() => {
    const alert = document.getElementById('alert');
    if (alert)
    {
      alert.hidden = true;
    }
  }, 5000);
})();
