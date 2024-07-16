document.addEventListener("DOMContentLoaded", () => {
  const url = window.location.href;

  const filter = (element) => {
    element.style.filter =
      "brightness(0) saturate(100%) invert(41%) sepia(23%) saturate(1419%) hue-rotate(253deg) brightness(94%) contrast(98%)";
  };

  const links = document.querySelectorAll("li > a > img");

  links.forEach((img) => {
    const parent = img.closest("li");

    switch (url) {
      case "http://localhost:3000/":
        if (parent.id === "link_home") filter(img);
        break;

      case "http://localhost:3000/friends":
        if (parent.id === "link_friends") filter(img);
        break;

      case "http://localhost:3000/messages":
        if (parent.id === "link_messages") filter(img);
        break;

      default:
        if (parent.id === "link_profile") filter(img);
        break;
    }
  });
});
