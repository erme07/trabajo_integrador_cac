<main class="container">
  <div class="contact">
    <h2 class="contact__title">LogIn</h2>
    <form class="form">
      <div class="full">
          <label for="email">Usuario</label>
          <input type="text" name="email" id="email" autocomplete="on" placeholder="Ingrese su nombre de usuario o correo ">
      </div>
      <div class="full">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Contraseña">
      </div>
      <div class="full wrong-access">
      </div>
      <button type="submit">LogIn</button>
    </form>
    <p class="contact__register">Si aun no tienes un usuario <a href="<?php echo BASE_URL; ?>/pages/register.php">registrate</a></p>
  </div>
</main>