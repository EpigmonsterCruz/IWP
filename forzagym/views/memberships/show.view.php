<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= htmlspecialchars($membership['plan_name']) ?> · <?= htmlspecialchars($membership['client_name']) ?></div>
      </div>
      <a href="<?= BASE_URL ?>/memberships/edit?id=<?= $membership['id'] ?>" class="btn btn-ghost btn-sm">Editar</a>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/memberships" class="back-link">&larr; Volver a membresías</a>

      <div class="detail-card">
        <div class="detail-row">
          <dt>Cliente</dt>
          <dd><a href="<?= BASE_URL ?>/clients/show?id=<?= $membership['client_id'] ?>"><?= htmlspecialchars($membership['client_name']) ?></a> · <?= htmlspecialchars($membership['client_email']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Plan</dt>
          <dd><?= htmlspecialchars($membership['plan_name']) ?> ($<?= number_format((float)$membership['plan_price'], 2) ?> / <?= $membership['duration_days'] ?> días)</dd>
        </div>
        <div class="detail-row">
          <dt>Vigencia</dt>
          <dd><?= date('d M Y', strtotime($membership['start_date'])) ?> – <?= date('d M Y', strtotime($membership['end_date'])) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Estado</dt>
          <dd><span class="badge <?= $membership['status'] ?>"><?= ucfirst($membership['status']) ?></span></dd>
        </div>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
