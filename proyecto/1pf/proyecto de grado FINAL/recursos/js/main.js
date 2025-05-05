document.addEventListener("DOMContentLoaded", function () {
  // Agregar hovered a la lista de navegación
  let list = document.querySelectorAll(".navigation li");

  function activeLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
  }

  if (list.length > 0) {
    list.forEach((item) => item.addEventListener("mouseover", activeLink));
  }

  // Toggle del menú
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");

  if (toggle && navigation && main) {
    toggle.onclick = function () {
      navigation.classList.toggle("active");
      main.classList.toggle("active");
    };
  }

  // Cerrar modal
  let modalCheckbox = document.getElementById("btn-modal");
  let modalContainer = document.querySelector(".container-modal");

  if (modalCheckbox && modalContainer) {
    modalContainer.addEventListener("click", function (event) {
      if (event.target === modalContainer) {
        modalCheckbox.checked = false;
      }
    });
  }

  // Activar enlaces del menú lateral
  const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

  if (allSideMenu.length > 0) {
    allSideMenu.forEach((item) => {
      const li = item.parentElement;

      item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
          i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
      });
    });
  }

  // Toggle sidebar
  const menuBar = document.querySelector("#content nav .bx.bx-menu");
  const sidebar = document.getElementById("sidebar");

  if (menuBar && sidebar) {
    menuBar.addEventListener("click", function () {
      sidebar.classList.toggle("hide");
    });
  }
});
