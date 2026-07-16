<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">Registra un nuevo pago</div>
      </div>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/payments" class="back-link">&larr; Volver a pagos</a>

      <div class="form-card">
        <form method="POST" action="<?= BASE_URL ?>/payments/create">
          <div class="form-grid">
            <div class="field full">
              <label for="pm-client">Cliente</label>
              <select id="pm-client" name="client_id">
                <option value="">Selecciona un cliente</option>
                <?php foreach ($clients as $c): ?>
                  <option value="<?= $c['id'] ?>" <?= (string)($payment['client_id'] ?? '') === (string)$c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['first_name'] . ' ' . $c['last_name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <p class="err"><?= $error['client_id'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="pm-membership">Membresía relacionada (opcional)</label>
              <select id="pm-membership" name="membership_id">
                <option value="">Sin membresía asociada</option>
                <?php foreach ($memberships as $m): ?>
                  <option value="<?= $m['id'] ?>" <?= (string)($payment['membership_id'] ?? '') === (string)$m['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['client_name'] . ' — ' . $m['plan_name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="field">
              <label for="pm-amount">Monto ($)</label>
              <input id="pm-amount" name="amount" type="number" step="0.01" min="0" value="<?= htmlspecialchars($payment['amount'] ?? '') ?>">
              <p class="err"><?= $error['amount'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="pm-date">Fecha de pago</label>
              <input id="pm-date" name="payment_date" type="date" value="<?= htmlspecialchars($payment['payment_date'] ?? '') ?>">
              <p class="err"><?= $error['payment_date'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="pm-method">Método de pago</label>
              <select id="pm-method" name="method">
                <option value="Credit Card" <?= ($payment['method'] ?? '') === 'Credit Card' ? 'selected' : '' ?>>Tarjeta de crédito</option>
                <option value="Cash" <?= ($payment['method'] ?? '') === 'Cash' ? 'selected' : '' ?>>Efectivo</option>
                <option value="Bank Transfer" <?= ($payment['method'] ?? '') === 'Bank Transfer' ? 'selected' : '' ?>>Transferencia bancaria</option>
              </select>
              <p class="err"><?= $error['method'] ?? '' ?></p>
            </div>
          </div>
          <div class="form-actions">
            <a href="<?= BASE_URL ?>/payments" class="btn btn-ghost">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar pago</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
