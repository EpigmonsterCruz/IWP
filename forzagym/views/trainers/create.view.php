<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">Registra un nuevo entrenador</div>
      </div>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/trainers" class="back-link">&larr; Volver a entrenadores</a>

      <div class="form-card">
        <form method="POST" action="<?= BASE_URL ?>/trainers/create">
          <div class="form-grid">
            <div class="field">
              <label for="tr-first">Nombre</label>
              <input id="tr-first" name="first_name" type="text" value="<?= htmlspecialchars($trainer['first_name'] ?? '') ?>">
              <p class="err"><?= $error['first_name'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="tr-last">Apellido</label>
              <input id="tr-last" name="last_name" type="text" value="<?= htmlspecialchars($trainer['last_name'] ?? '') ?>">
              <p class="err"><?= $error['last_name'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="tr-email">Correo electrónico</label>
              <input id="tr-email" name="email" type="email" value="<?= htmlspecialchars($trainer['email'] ?? '') ?>">
              <p class="err"><?= $error['email'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="tr-phone">Teléfono</label>
              <input id="tr-phone" name="phone" type="text" placeholder="778-000-0000" value="<?= htmlspecialchars($trainer['phone'] ?? '') ?>">
              <p class="err"><?= $error['phone'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="tr-spec">Especialización</label>
              <input id="tr-spec" name="specialization" type="text" placeholder="Ej. Strength & Conditioning" value="<?= htmlspecialchars($trainer['specialization'] ?? '') ?>">
              <p class="err"><?= $error['specialization'] ?? '' ?></p>
            </div>
          </div>
          <div class="form-actions">
            <a href="<?= BASE_URL ?>/trainers" class="btn btn-ghost">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar entrenador</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
