document.addEventListener("DOMContentLoaded", () => {
  button_view_register.addEventListener("click", () => {
    container_register.style.display = "flex";
    filter_container.style.display = "block";
  });

  button_close_register.addEventListener("click", () => {
    container_register.style.display = "none";
    filter_container.style.display = "none";
  });
});
