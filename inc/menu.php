
<body>
  <!-- Main container -->
  <div class="container">
    <!-- Blueprint header -->
    <header class="bp-header cf">
      <div class="dummy-logo">
        <div class="dummy-icon foodicon foodicon--coconut" onclick="irInicio()"></div>

        <h2 class="dummy-heading">GamesBreak</h2>
      </div>
      <div class="bp-header__main">
        <span class="bp-header__present">usuario: <span class="bp-tooltip bp-icon bp-icon--about" data-content="Establece un nombre de usuario para que aparezca aquí debajo"></span></span>
        <?php if (isset($_SESSION["nombreUsuario"])) {
          echo '<h1 class="bp-header__title">'.$_SESSION["nombreUsuario"].'</h1>';
        } ?>
        
        
      </div>
    </header>
    <button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
    <nav id="ml-menu" class="menu">
      <button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
      <div class="menu__wrap">
        <ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1" aria-owns="submenu-1" href="#">Juegos</a></li>
          <?php if($auth->isLoggedIn()){//Puedo usar este metodo o el de >= 0 si me funciona el $_SESSION
          echo '<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2" aria-owns="submenu-2" href="#">Proponer</a></li>';
          }?>
          <!-- <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3" aria-owns="submenu-3" href="#">Grains</a></li> -->
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4" aria-owns="submenu-4" href="#">Members Area</a></li>
        </ul>
        <!-- Submenu 1 -->
        <ul data-menu="submenu-1" id="submenu-1" class="menu__level" tabindex="-1" role="menu" aria-label="Juegos">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Calidad Precio</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1-1" aria-owns="submenu-1-1" href="#">Duración</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1-2" aria-owns="submenu-1-2" href="#">Valoración</a></li>
        </ul>
        <!-- Submenu 1-1 -->
        <ul data-menu="submenu-1-1" id="submenu-1-1" class="menu__level" tabindex="-1" role="menu" aria-label="Duración">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Mas largos</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Mas cortos</a></li>
        </ul>
        <!-- Submenu 1-2 -->
        <ul data-menu="submenu-1-2" id="submenu-1-2" class="menu__level" tabindex="-1" role="menu" aria-label="Valoración">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Mejor valorados</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Peor valorados</a></li>
        </ul>
        <!-- Submenu 2 -->
        <?php if($_SESSION['idUsuario'] >= 0){
          echo '
            <ul data-menu="submenu-2" id="submenu-2" class="menu__level" tabindex="-1" role="menu" aria-label="Proponer">
              <li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=proponer_juego\')">Juego nuevo</a></li>
              <li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=proponer_mejoras\')">Mejoras página</a></li>
            </ul>
          ';
        }?>
        <!-- Submenu 2-1 -->
        <!-- <ul data-menu="submenu-2-1" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Exotic Mixes</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Wild Pick</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Vitamin Boosters</a></li>
        </ul> -->
        <!-- Submenu 3 -->
        <!-- <ul data-menu="submenu-3" id="submenu-3" class="menu__level" tabindex="-1" role="menu" aria-label="Grains">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Buckwheat</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Millet</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Quinoa</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Wild Rice</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Durum Wheat</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3-1" aria-owns="submenu-3-1" href="#">Promo Packs</a></li>
        </ul> -->
        <!-- Submenu 3-1 -->
        <!-- <ul data-menu="submenu-3-1" id="submenu-3-1" class="menu__level" tabindex="-1" role="menu" aria-label="Promo Packs">
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Starter Kit</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">The Essential 8</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bolivian Secrets</a></li>
          <li class="menu__item" role="menuitem"><a class="menu__link" href="#">Flour Packs</a></li>
        </ul> -->
        <!-- Submenu 4 -->
        <ul data-menu="submenu-4" id="submenu-4" class="menu__level" tabindex="-1" role="menu" aria-label="Members Area">
          <?php if(!$auth->isLoggedIn()){
            echo '<li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=registro\')">Crear Usuario</a></li>';
            echo '<li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=acceso\')">Iniciar Sesión</a></li>';
          }
          else{
            echo '<li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=cambiar_nombre\')">Cambiar nombre de usuario</a></li>';
            echo '<li class="menu__item" role="menuitem"><a class="menu__link" href="#" onclick="irA(\'index.php?cargar=logout\')">Cerrar Sesión</a></li>';
          }
          ?>

        </ul>
      </div>
    </nav>
    <div class="content">
      <!-- <p class="info">Please choose a category</p> -->
      <!-- Ajax loaded content here -->
    

    <!--
    <?php 
        if (!isset($_SESSION['nick']))
          echo '<a class="nav-link" href="index.php?cargar=registro">Registro</a>';
      ?>
    -->
