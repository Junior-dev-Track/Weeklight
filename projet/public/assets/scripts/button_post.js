document.addEventListener("DOMContentLoaded", () => {
  button_open_window_post.addEventListener("click", () => {
    container_show.style.display = "flex";
    component_filter.style.display = "block";
  });

  button_close_window.addEventListener("click", () => {
    container_show.style.display = "none";
    component_filter.style.display = "none";
  });
});
