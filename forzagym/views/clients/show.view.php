<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) ?></div>
      </div>
      <a href="<?= BASE_URL ?>/clients/edit?id=<?= $client['id'] ?>" class="btn btn-ghost btn-sm">Editar cliente</a>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/clients" class="back-link">&larr; Volver a clientes</a>

      <div class="detail-card" style="margin-bottom:20px;">
        <div class="detail-row">
          <dt>Nombre completo</dt>
          <dd><?= htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Correo electrónico</dt>
          <dd><?= htmlspecialchars($client['email']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Teléfono</dt>
          <dd><?= htmlspecialchars($client['phone']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Estado</dt>
          <dd><span class="badge <?= $client['status'] ?>"><?= ucfirst($client['status']) ?></span></dd>
        </div>
        <div class="detail-row">
          <dt>Cliente desde</dt>
          <dd><?= date('d M Y', strtotime($client['created_at'])) ?></dd>
        </div>
      </div>

      <div class="panel-head">
        <h3>Historial de membresías</h3>
        <a class="view-all" href="<?= BASE_URL ?>/memberships">Ver todas →</a>
      </div>

      <?php if (empty($memberships)): ?>
        <p style="color:var(--muted);font-size:13.5px;">Este cliente aún no tiene membresías registradas.</p>
      <?php else: ?>
        <div class="table-card">
          <table>
            <thead>
              <tr><th>Plan</th><th>Inicio</th><th>Vencimiento</th><th>Estado</th></tr>
            </thead>
            <tbody>
              <?php foreach ($memberships as $m): ?>
                <tr>
                  <td class="cell-name"><?= htmlspecialchars($m['plan_name']) ?></td>
                  <td><?= date('d M Y', strtotime($m['start_date'])) ?></td>
                  <td><?= date('d M Y', strtotime($m['end_date'])) ?></td>
                  <td><span class="badge <?= $m['status'] ?>"><?= ucfirst($m['status']) ?></span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
