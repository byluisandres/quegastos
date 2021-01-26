var iconMenu = document.querySelector("#iconMenu");
var sidebar = document.querySelector("#sidebar");
var content = document.querySelector("#content");
iconMenu.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  content.classList.toggle("opacidad");
});
content.addEventListener("click", () => {
  sidebar.classList.remove("open");
  content.classList.remove("opacidad");
});
