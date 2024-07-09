document.addEventListener("DOMContentLoaded", () => {
  button_open_window_post.addEventListener("click", () => {
    container_show.style.display = "flex";
    filter_container.style.display = "block";
  });

  button_close_window.addEventListener("click", () => {
    container_show.style.display = "none";
    filter_container.style.display = "none";
  });
});
