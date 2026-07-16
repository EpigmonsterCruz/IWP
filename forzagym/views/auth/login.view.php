<?php require base_path('views/partials/header.php'); ?>
<div class="auth-screen">
  <div class="login-visual lanes">
    <div class="brand">
      <div class="brand-mark">FG</div>
      <div class="brand-name">FORZAGYM</div>
    </div>
    <div class="login-quote">
      <div class="num">01</div>
      <h1>Un solo panel para<br>todo el gimnasio.</h1>
      <p>Membresías, clases, entrenadores y pagos — sin hojas de cálculo, sin conflictos de horario, sin membresías vencidas sin avisar.</p>
    </div>
    <div class="login-stats">
      <div><span class="n">10</span><span class="l">Sedes activas</span></div>
      <div><span class="n">312</span><span class="l">Clientes</span></div>
      <div><span class="n">98%</span><span class="l">Asistencia</span></div>
    </div>
  </div>

  <div class="login-form-wrap">
    <div class="login-form">
      <h1>Bienvenido de nuevo</h1>
      <p class="login-sub">Ingresa a tu panel de ForzaGym.</p>

      <?php if (!empty($error['login'])): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error['login']) ?></div>
      <?php endif; ?>

      <form method="POST" action="<?= BASE_URL ?>/login">
        <div class="field">
          <label for="li-email">Correo electrónico</label>
          <input id="li-email" name="email" type="email" placeholder="staff@forzagym.com" value="<?= htmlspecialchars($old_email ?? '') ?>" required>
        </div>
        <div class="field">
          <label for="li-pass">Contraseña</label>
          <input id="li-pass" name="password" type="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
      </form>

      <div class="login-toggle">¿No tienes cuenta? <a href="<?= BASE_URL ?>/register">Regístrate</a></div>

      <div class="login-note">
        <strong>Cuenta demo:</strong> admin@forzagym.com / demo1234
      </div>
    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
