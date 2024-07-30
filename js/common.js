const navButton = document.querySelector(".nav-button");
const globalNav = document.querySelector(".global-nav");
const navbars = document.querySelectorAll(".navbar");

navButton.addEventListener("click", navigation);

function navigation() {
  navbars.forEach((navbar) => navbar.classList.toggle("active"));
  globalNav.classList.toggle("active");
}

if (document.getElementById("pass1")) {
  const pass1 = document.getElementById("pass1");
  const pass2 = document.getElementById("pass2");
  const registerButton = document.getElementById("register-button");

  function checkPass() {
    registerButton.disabled = pass1.value !== pass2.value;
  }

  [pass1, pass2].forEach((input) => {
    input.addEventListener("input", checkPass);
  });

  checkPass();
} else if (document.getElementById("word")) {
  const word = document.getElementById("word");
  const ja = document.getElementById("ja");
  const wordRegisterButton = document.getElementById("word-register-button");

  function checkWord() {
    wordRegisterButton.disabled = !(word.value.trim() && ja.value.trim());
  }

  [word, ja].forEach((input) => {
    input.addEventListener("input", checkWord);
  });
  checkWord();
}

if (document.getElementById("word-delete")) {
  const wordDeletes = document.querySelectorAll("#word-delete");
  const wordDeleteButtons = document.querySelectorAll(".word-delete-button");

  wordDeletes.forEach((wordDelete, index) =>
    wordDelete.addEventListener("click", function () {
      if (wordDeleteButtons[index]) {
        wordDeleteButtons[index].classList.toggle("active");
      }
    })
  );
}
