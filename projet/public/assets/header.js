document.addEventListener("DOMContentLoaded", () => {
  url = window.location.href;

  switch (url) {
    case "http://localhost:3000/":
      link_home.style.filter =
        "invert(42%) sepia(55%) saturate(983%) hue-rotate(258deg) brightness(80%) contrast(85%)";
      break;

    case "http://localhost:3000/friends":
      link_friends.style.filter =
        "invert(42%) sepia(55%) saturate(983%) hue-rotate(258deg) brightness(80%) contrast(85%)";
      break;

    case "http://localhost:3000/messages":
      link_messages.style.filter =
        "invert(42%) sepia(55%) saturate(983%) hue-rotate(258deg) brightness(80%) contrast(85%)";
      break;

    case "http://localhost:3000/profile":
      link_profile.style.filter =
        "invert(42%) sepia(55%) saturate(983%) hue-rotate(258deg) brightness(80%) contrast(85%)";
      break;
  }
});
