<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">Asigna un plan de membresía a un cliente</div>
      </div>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/memberships" class="back-link">&larr; Volver a membresías</a>

      <div class="form-card">
        <form method="POST" action="<?= BASE_URL ?>/memberships/create">
          <div class="form-grid">
            <div class="field full">
              <label for="ms-client">Cliente</label>
              <select id="ms-client" name="client_id">
                <option value="">Selecciona un cliente</option>
                <?php foreach ($clients as $c): ?>
                  <option value="<?= $c['id'] ?>" <?= (string)($membership['client_id'] ?? '') === (string)$c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['first_name'] . ' ' . $c['last_name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <p class="err"><?= $error['client_id'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="ms-plan">Plan</label>
              <select id="ms-plan" name="plan_id">
                <option value="">Selecciona un plan</option>
                <?php foreach ($plans as $p): ?>
                  <option value="<?= $p['id'] ?>" <?= (string)($membership['plan_id'] ?? '') === (string)$p['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p['name']) ?> — $<?= number_format((float)$p['price'], 2) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <p class="err"><?= $error['plan_id'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="ms-start">Fecha de inicio</label>
              <input id="ms-start" name="start_date" type="date" value="<?= htmlspecialchars($membership['start_date'] ?? '') ?>">
              <p class="err"><?= $error['start_date'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="ms-end">Fecha de vencimiento</label>
              <input id="ms-end" name="end_date" type="date" value="<?= htmlspecialchars($membership['end_date'] ?? '') ?>">
              <p class="err"><?= $error['end_date'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="ms-status">Estado</label>
              <select id="ms-status" name="status">
                <option value="active" <?= ($membership['status'] ?? '') === 'active' ? 'selected' : '' ?>>Activa</option>
                <option value="expired" <?= ($membership['status'] ?? '') === 'expired' ? 'selected' : '' ?>>Vencida</option>
                <option value="suspended" <?= ($membership['status'] ?? '') === 'suspended' ? 'selected' : '' ?>>Suspendida</option>
              </select>
              <p class="err"><?= $error['status'] ?? '' ?></p>
            </div>
          </div>
          <div class="form-actions">
            <a href="<?= BASE_URL ?>/memberships" class="btn btn-ghost">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar membresía</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
