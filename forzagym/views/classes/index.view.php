<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= count($classes) ?> clases programadas</div>
      </div>
    </div>
    <div class="content">

      <div class="section-head">
        <h2 style="font-size:0;"></h2>
        <div class="toolbar">
          <a href="<?= BASE_URL ?>/classes/create" class="btn btn-primary btn-sm">+ Nueva clase</a>
        </div>
      </div>

      <?php if (empty($classes)): ?>
        <div class="table-card">
          <div class="empty-state">
            <strong>Todavía no hay clases</strong>
            <p>Crea la primera clase y asígnale un entrenador.</p>
          </div>
        </div>
      <?php else: ?>
      <div class="class-grid">
        <?php foreach ($classes as $c):
          $pct = $c['capacity'] > 0 ? min(100, round(($c['enrolled'] / $c['capacity']) * 100)) : 0;
          $ringColor = $pct >= 90 ? 'var(--accent)' : ($pct >= 70 ? 'var(--warn)' : 'var(--steel)');
          $radius = 17; $circumference = 2 * M_PI * $radius;
          $offset = $circumference * (1 - $pct / 100);
        ?>
          <div class="class-card">
            <div class="top-row">
              <div>
                <h4><?= htmlspecialchars($c['name']) ?></h4>
                <div class="trainer"><?= htmlspecialchars($c['trainer_name']) ?></div>
              </div>
              <div class="price">$<?= number_format((float)$c['price'], 2) ?></div>
            </div>
            <div style="font-size:12.5px;color:var(--muted);">
              <?= substr($c['schedule_time'], 0, 5) ?> · <?= htmlspecialchars($c['location']) ?>
            </div>
            <div class="meta-row">
              <div class="gym"><?= (int)$c['enrolled'] ?> / <?= (int)$c['capacity'] ?> inscritos</div>
              <div class="ring-wrap">
                <svg width="40" height="40" viewBox="0 0 40 40">
                  <circle cx="20" cy="20" r="<?= $radius ?>" fill="none" stroke="var(--line)" stroke-width="4"/>
                  <circle cx="20" cy="20" r="<?= $radius ?>" fill="none" stroke="<?= $ringColor ?>" stroke-width="4"
                          stroke-dasharray="<?= $circumference ?>" stroke-dashoffset="<?= $offset ?>"
                          stroke-linecap="round" transform="rotate(-90 20 20)"/>
                  <text x="20" y="24" text-anchor="middle" font-size="10" font-family="Inter" fill="var(--text)"><?= $pct ?>%</text>
                </svg>
              </div>
            </div>
            <div class="form-actions" style="margin-top:14px;">
              <a href="<?= BASE_URL ?>/classes/show?id=<?= $c['id'] ?>" class="btn btn-ghost btn-sm">Ver</a>
              <a href="<?= BASE_URL ?>/classes/edit?id=<?= $c['id'] ?>" class="btn btn-ghost btn-sm">Editar</a>
              <form class="delete-form" method="POST" action="<?= BASE_URL ?>/classes" onsubmit="return confirm('¿Eliminar la clase <?= htmlspecialchars($c['name']) ?>?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $c['id'] ?>">
                <button type="submit" class="btn btn-ghost btn-sm" style="color:var(--accent-dark);">Eliminar</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
