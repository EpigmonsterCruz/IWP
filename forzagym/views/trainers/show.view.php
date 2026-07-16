<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= htmlspecialchars($trainer['first_name'] . ' ' . $trainer['last_name']) ?></div>
      </div>
      <a href="<?= BASE_URL ?>/trainers/edit?id=<?= $trainer['id'] ?>" class="btn btn-ghost btn-sm">Editar entrenador</a>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/trainers" class="back-link">&larr; Volver a entrenadores</a>

      <div class="detail-card" style="margin-bottom:20px;">
        <div class="detail-row">
          <dt>Nombre completo</dt>
          <dd><?= htmlspecialchars($trainer['first_name'] . ' ' . $trainer['last_name']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Especialización</dt>
          <dd><?= htmlspecialchars($trainer['specialization']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Correo electrónico</dt>
          <dd><?= htmlspecialchars($trainer['email']) ?></dd>
        </div>
        <div class="detail-row">
          <dt>Teléfono</dt>
          <dd><?= htmlspecialchars($trainer['phone']) ?></dd>
        </div>
      </div>

      <div class="panel-head">
        <h3>Clases asignadas</h3>
        <a class="view-all" href="<?= BASE_URL ?>/classes">Ver todas →</a>
      </div>

      <?php if (empty($classes)): ?>
        <p style="color:var(--muted);font-size:13.5px;">Este entrenador no tiene clases asignadas todavía.</p>
      <?php else: ?>
        <div class="table-card">
          <table>
            <thead><tr><th>Clase</th><th>Sede</th><th>Horario</th></tr></thead>
            <tbody>
              <?php foreach ($classes as $c): ?>
                <tr>
                  <td class="cell-name"><a href="<?= BASE_URL ?>/classes/show?id=<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></a></td>
                  <td><?= htmlspecialchars($c['location']) ?></td>
                  <td><?= substr($c['schedule_time'], 0, 5) ?></td>
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
