document.addEventListener("DOMContentLoaded", () => {
  const mainContent = document.getElementById("main-content");

  // Socket.IO connection
  const socket = io("http://localhost:3001");

  const form = document.getElementById("form");
  const input = document.getElementById("input");
  const messages = document.getElementById("messages");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (input.value) {
      socket.emit("chat message", input.value);
      input.value = "";
    }
  });

  socket.on("chat message", function (msg) {
    const item = document.createElement("li");
    item.textContent = msg;
    messages.appendChild(item);
    window.scrollTo(0, document.body.scrollHeight);
  });

  function updateMainContent(content) {
    mainContent.innerHTML = content;
  }

  function loadContent(url) {
    fetch(url)
      .then((response) => response.text())
      .then((data) => updateMainContent(data))
      .catch((error) => console.error("Error:", error));
  }

  document.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const url = event.target.getAttribute("href");
      history.pushState(null, "", url);
      loadContent(url);
    });
  });

  window.addEventListener("popstate", () => {
    loadContent(window.location.pathname);
  });
});
