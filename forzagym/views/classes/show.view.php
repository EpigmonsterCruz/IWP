<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= htmlspecialchars($class['name']) ?></div>
      </div>
      <a href="<?= BASE_URL ?>/classes/edit?id=<?= $class['id'] ?>" class="btn btn-ghost btn-sm">Editar clase</a>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/classes" class="back-link">&larr; Volver a clases</a>

      <div class="detail-card" style="margin-bottom:20px;">
        <div class="detail-row">
          <dt>Entrenador</dt>
          <dd><?= htmlspecialchars($class['trainer_name']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Sede</dt>
          <dd><?= htmlspecialchars($class['location']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Horario</dt>
          <dd><?= substr($class['schedule_time'], 0, 5) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Capacidad</dt>
          <dd><?= count($enrolledClients) ?> / <?= $class['capacity'] ?> inscritos</dd>
        </div>
        <div class="detail-row">
          <dt>Precio</dt>
          <dd>$<?= number_format((float)$class['price'], 2) ?></dd>
        </div>
      </div>

      <div class="panel-head">
        <h3>Clientes inscritos</h3>
      </div>

      <?php if (empty($enrolledClients)): ?>
        <p style="color:var(--muted);font-size:13.5px;">Todavía no hay clientes inscritos en esta clase.</p>
      <?php else: ?>
        <div class="table-card">
          <table>
            <thead><tr><th>Cliente</th><th>Asistencia</th></tr></thead>
            <tbody>
              <?php foreach ($enrolledClients as $ec): ?>
                <tr>
                  <td class="cell-name"><a href="<?= BASE_URL ?>/clients/show?id=<?= $ec['id'] ?>"><?= htmlspecialchars($ec['first_name'] . ' ' . $ec['last_name']) ?></a></td>
                  <td>
                    <?php if ($ec['attendance']): ?>
                      <span class="badge <?= $ec['attendance'] ?>"><?= ucfirst($ec['attendance']) ?></span>
                    <?php else: ?>
                      <span style="color:var(--muted);font-size:12.5px;">Sin registrar</span>
                    <?php endif; ?>
                  </td>
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
