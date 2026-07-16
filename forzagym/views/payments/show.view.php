<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">$<?= number_format((float)$payment['amount'], 2) ?> · <?= htmlspecialchars($payment['client_name']) ?></div>
      </div>
      <a href="<?= BASE_URL ?>/payments/edit?id=<?= $payment['id'] ?>" class="btn btn-ghost btn-sm">Editar</a>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/payments" class="back-link">&larr; Volver a pagos</a>

      <div class="detail-card">
        <div class="detail-row">
          <dt>Cliente</dt>
          <dd><a href="<?= BASE_URL ?>/clients/show?id=<?= $payment['client_id'] ?>"><?= htmlspecialchars($payment['client_name']) ?></a> · <?= htmlspecialchars($payment['client_email']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Membresía relacionada</dt>
          <dd><?= $payment['plan_name'] ? htmlspecialchars($payment['plan_name']) : '<span style="color:var(--muted);">Sin membresía asociada</span>' ?></dd>
        </div>
        <div class="detail-row">
          <dt>Monto</dt>
          <dd><strong>$<?= number_format((float)$payment['amount'], 2) ?></strong></dd>
        </div>
        <div class="detail-row">
          <dt>Método de pago</dt>
          <dd><?= htmlspecialchars($payment['method']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Fecha</dt>
          <dd><?= date('d M Y', strtotime($payment['payment_date'])) ?></dd>
        </div>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
