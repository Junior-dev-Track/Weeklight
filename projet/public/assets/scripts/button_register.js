document.addEventListener("DOMContentLoaded", () => {
  button_view_register.addEventListener("click", () => {
    container_register.style.display = "flex";
    component_filter.style.display = "block";
  });

  button_close_window.addEventListener("click", () => {
    container_register.style.display = "none";
    component_filter.style.display = "none";
  });
});
