const fadeAlertOut = () => {
  document.querySelector(".alert").style.transition = "opacity 1s ease-out";
  setTimeout(() => {
    document.querySelector(".alert").style.opacity = "0.5";
    setTimeout(() => {
      document.querySelector(".alert").style.opacity = "0";
    }, 1000);
  }, 1000);
};
