<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">Registra un nuevo cliente del gimnasio</div>
      </div>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/clients" class="back-link">&larr; Volver a clientes</a>

      <div class="form-card">
        <form method="POST" action="<?= BASE_URL ?>/clients/create">
          <div class="form-grid">
            <div class="field">
              <label for="cl-first">Nombre</label>
              <input id="cl-first" name="first_name" type="text" value="<?= htmlspecialchars($client['first_name'] ?? '') ?>">
              <p class="err"><?= $error['first_name'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cl-last">Apellido</label>
              <input id="cl-last" name="last_name" type="text" value="<?= htmlspecialchars($client['last_name'] ?? '') ?>">
              <p class="err"><?= $error['last_name'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cl-email">Correo electrónico</label>
              <input id="cl-email" name="email" type="email" value="<?= htmlspecialchars($client['email'] ?? '') ?>">
              <p class="err"><?= $error['email'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cl-phone">Teléfono</label>
              <input id="cl-phone" name="phone" type="text" placeholder="778-000-0000" value="<?= htmlspecialchars($client['phone'] ?? '') ?>">
              <p class="err"><?= $error['phone'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="cl-status">Estado de membresía</label>
              <select id="cl-status" name="status">
                <option value="active" <?= ($client['status'] ?? '') === 'active' ? 'selected' : '' ?>>Activo</option>
                <option value="expired" <?= ($client['status'] ?? '') === 'expired' ? 'selected' : '' ?>>Vencido</option>
                <option value="suspended" <?= ($client['status'] ?? '') === 'suspended' ? 'selected' : '' ?>>Suspendido</option>
              </select>
              <p class="err"><?= $error['status'] ?? '' ?></p>
            </div>
          </div>
          <div class="form-actions">
            <a href="<?= BASE_URL ?>/clients" class="btn btn-ghost">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar cliente</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
