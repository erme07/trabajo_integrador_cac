<nav class="navBar navBar--sticky" id="navBar">
  <div class="container">
    <div class="navBar__brand">
      <a href="<?php echo BASE_URL;?>" class="brand__logo"><img src="<?php echo BASE_URL;?>/assets/icons/codoacodo.png" alt="Logo de Codo a Codo"></a>
      <h2 class="brand__name">Conf Bs As</h2>
    </div>
    <ul class="menu menu--navbar" id="menu">
      <li><a href="<?php echo BASE_URL;?>" class="menu__item menu__item--active">La conferencia</a></li>
      <li><a href="#oradores" class="menu__item">Oradores</a></li>
      <li><a href="#lugarFecha" class="menu__item">Lugar y fecha</a></li>
      <li><a href="#convierteteOrador" class="menu__item">Conviertete en orador</a></li>
      <li><a href="<?php echo BASE_URL;?>/pages/tickets.php" class="menu__item menu__item--green">Comprar tickets</a></li>
      <?php if (isset($_SESSION['usuario'])) {?>
        <li class="menu__log">
            <span class="menu__item menu__item--black"><?php echo $_SESSION['usuario'];?></span>
            <a class="menu__item menu__item--outline" href="<?php echo BASE_URL; ?>/includes/cerrar.php">Salir</span></a> 
        </li>
      <?php } else { ?>
        <li class="menu__log">
          <a class="menu__item menu__item--black" href="<?php echo BASE_URL; ?>/pages/login.php">Ingresar</a>
          <a class="menu__item menu__item--outline" href="<?php echo BASE_URL; ?>/pages/register.php">Registrarse</a>
        </li>
      <?php } ?>
    </ul>
    <svg viewBox="250 200 350 250" class="burguer">
      <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top_bar" />
      <path d="M300,320 L540,320" class="middle_bar" />
      <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom_bar" transform="translate(480, 320) scale(1, -1) translate(-480, -318)" />
    </svg>
  </div>
</nav>