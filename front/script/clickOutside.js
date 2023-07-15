document.addEventListener("click", function (event) {
    const menu = document.querySelector(".nav");
    const toggleButton = document.querySelector("#iconsHeaderResponcives");
    const isClickInsideMenu = menu.contains(event.target) || toggleButton.contains(event.target);
    
    if (!isClickInsideMenu) {
      menu.classList.remove("showMenu");
    }
  });
  