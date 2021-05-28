const fadeAlertOut = () => {
  document.querySelector(".alert").style.transition = "opacity 1s";
  setTimeout(() => {
    document.querySelector(".alert").style.opacity = "0";
  }, 1000);
};

const fadeAlertIn = () => {
  document.querySelector(".alert").style.transition = "opacity 1s";
  setTimeout(() => {
    document.querySelector(".alert").style.opacity = "1";
  }, 1000);
};

const button = document.querySelector("#cep-submit");
button.addEventListener("click", () => {});
