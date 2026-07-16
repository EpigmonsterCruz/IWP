<?php require base_path('views/partials/header.php'); ?>
<div class="auth-screen">
  <div class="login-visual lanes">
    <div class="brand">
      <div class="brand-mark">FG</div>
      <div class="brand-name">FORZAGYM</div>
    </div>
    <div class="login-quote">
      <div class="num">02</div>
      <h1>Un equipo,<br>un solo lugar.</h1>
      <p>Crea tu cuenta de staff para administrar clientes, membresías, clases, entrenadores y pagos desde un mismo panel.</p>
    </div>
    <div class="login-stats">
      <div><span class="n">10</span><span class="l">Sedes activas</span></div>
      <div><span class="n">312</span><span class="l">Clientes</span></div>
      <div><span class="n">98%</span><span class="l">Asistencia</span></div>
    </div>
  </div>

  <div class="login-form-wrap">
    <div class="login-form">
      <h1>Crear cuenta de staff</h1>
      <p class="login-sub">Registro para administradores y recepcionistas.</p>

      <form method="POST" action="<?= BASE_URL ?>/register">
        <div class="field">
          <label for="rg-first">Nombre</label>
          <input id="rg-first" name="first_name" type="text" placeholder="Ej. Jared" value="<?= htmlspecialchars($staff['first_name'] ?? '') ?>">
          <p class="err"><?= $error['first_name'] ?? '' ?></p>
        </div>
        <div class="field">
          <label for="rg-last">Apellido</label>
          <input id="rg-last" name="last_name" type="text" placeholder="Ej. Parido" value="<?= htmlspecialchars($staff['last_name'] ?? '') ?>">
          <p class="err"><?= $error['last_name'] ?? '' ?></p>
        </div>
        <div class="field">
          <label for="rg-email">Correo electrónico</label>
          <input id="rg-email" name="email" type="email" placeholder="staff@forzagym.com" value="<?= htmlspecialchars($staff['email'] ?? '') ?>">
          <p class="err"><?= $error['email'] ?? '' ?></p>
        </div>
        <div class="field">
          <label for="rg-role">Rol</label>
          <select id="rg-role" name="role">
            <option value="receptionist" <?= ($staff['role'] ?? '') === 'receptionist' ? 'selected' : '' ?>>Recepcionista</option>
            <option value="admin" <?= ($staff['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Administrador</option>
          </select>
          <p class="err"><?= $error['role'] ?? '' ?></p>
        </div>
        <div class="field">
          <label for="rg-pass">Contraseña</label>
          <input id="rg-pass" name="password" type="password" placeholder="••••••••">
          <p class="err"><?= $error['password'] ?? '' ?></p>
        </div>
        <div class="field">
          <label for="rg-pass-confirm">Confirmar contraseña</label>
          <input id="rg-pass-confirm" name="password_confirm" type="password" placeholder="••••••••">
          <p class="err"><?= $error['password_confirm'] ?? '' ?></p>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Crear cuenta</button>
      </form>

      <div class="login-toggle">¿Ya tienes cuenta? <a href="<?= BASE_URL ?>/login">Inicia sesión</a></div>
    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
