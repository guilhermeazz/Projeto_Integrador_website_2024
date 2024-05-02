function toggleMenu() {
    var menu = document.getElementById("profileMenu");
    if (menu.style.display === "none") {
      menu.style.display = "block";
    } else {
      menu.style.display = "none";
    }
  }
  
  // Fechar o menu se clicar fora dele
  window.onclick = function(event) {
    if (!event.target.closest('.profile')) {
      var menus = document.getElementsByClassName("profile-menu");
      for (var i = 0; i < menus.length; i++) {
        var openMenu = menus[i];
        openMenu.style.display = "none";
      }
    }
  }
  