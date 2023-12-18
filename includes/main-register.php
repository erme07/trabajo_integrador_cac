<main class="container">
  <div class="contact">
    <h2 class="contact__title">Registro</h2>
      <form class="form">
        <div class="full">
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            <div class="error"></div>
        </div>
        <div class="full">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" placeholder="Correo" autocomplete="on">
            <div class="error"></div>
        </div>
        <div class="full">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <div class="error"></div>
        </div>
        <div class="full">
            <label for="confirm_password" class="form-label">Repetir Contraseña</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Contraseña">
            <div class="error"></div>
        </div>
        <button type="submit">Crear usuario</button>
      </form>
      <p class="contact__login">Si ya tienes un usuario <a href="<?php echo BASE_URL; ?>/pages/login.php">logueate</a></p>
  </div>
</main>