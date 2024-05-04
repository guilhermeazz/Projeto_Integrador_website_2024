function toggleMenu() {
  var menu = document.getElementById("profileMenu");
  if (menu.style.display === "none" || menu.style.display === "") {
      menu.style.display = "block";
  } else {
      menu.style.display = "none";
  }
}

window.onclick = function(event) {
  if (!event.target.closest('.profile')) {
      var menus = document.getElementsByClassName("profile-menu");
      for (var i = 0; i < menus.length; i++) {
          var openMenu = menus[i];
          openMenu.style.display = "none";
      }
  }
}

window.onload = function() {
  var loggedIn = "<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'true' : 'false'; ?>";

  if (loggedIn === "true") {
      var profileMenu = document.getElementById('profileMenu');
      profileMenu.innerHTML = '<a href="perfil.html">Perfil</a><a href="compras.html">Compras</a><a href="index.html" onclick="logout()">Sair</a>';
  }
}

function logout() {
  window.location.href = "http://localhost/www/projeto_integrador_2024_website/backend/logout.php";
}
