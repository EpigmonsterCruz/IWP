<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2>Dashboard</h2>
        <div class="sub">Resumen general de FitTrack Downtown y sedes conectadas</div>
      </div>
    </div>
    <div class="content">

      <div class="stat-grid">
        <div class="stat-card">
          <div class="icon-badge" style="background:var(--accent-soft);color:var(--accent-dark);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </div>
          <div class="val"><?= (int)$activeClients ?></div>
          <div class="lbl">Clientes activos</div>
        </div>
        <div class="stat-card">
          <div class="icon-badge" style="background:var(--success-soft);color:var(--success);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M2 10h20"/></svg>
          </div>
          <div class="val">$<?= number_format((float)$monthlyRevenue, 2) ?></div>
          <div class="lbl">Ingresos del mes</div>
        </div>
        <div class="stat-card">
          <div class="icon-badge" style="background:var(--steel-soft);color:var(--steel);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
          </div>
          <div class="val"><?= (int)$totalClasses ?></div>
          <div class="lbl">Clases activas</div>
        </div>
        <div class="stat-card">
          <div class="icon-badge" style="background:var(--warn-soft);color:var(--warn);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01"/><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/></svg>
          </div>
          <div class="val"><?= (int)$expiringMemberships ?></div>
          <div class="lbl">Membresías por vencer</div>
          <span class="delta warn">Próximos 14 días</span>
        </div>
      </div>

      <div class="panel-row">
        <div class="panel">
          <div class="panel-head">
            <h3>Horario de clases</h3>
            <a class="view-all" href="<?= BASE_URL ?>/classes">Ver todo →</a>
          </div>
          <?php if (empty($todaySchedule)): ?>
            <p style="color:var(--muted);font-size:13px;">No hay clases registradas todavía.</p>
          <?php else: ?>
            <?php foreach ($todaySchedule as $class): ?>
              <div class="sched-row">
                <div class="sched-time"><?= substr($class['schedule_time'], 0, 5) ?></div>
                <div class="sched-info">
                  <div class="cname"><?= htmlspecialchars($class['name']) ?></div>
                  <div class="cmeta"><?= htmlspecialchars($class['trainer_name']) ?> · <?= htmlspecialchars($class['location']) ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div class="panel">
          <div class="panel-head">
            <h3>Pagos recientes</h3>
            <a class="view-all" href="<?= BASE_URL ?>/payments">Ver todo →</a>
          </div>
          <?php if (empty($recentPayments)): ?>
            <p style="color:var(--muted);font-size:13px;">Aún no hay pagos registrados.</p>
          <?php else: ?>
            <?php foreach ($recentPayments as $payment): ?>
              <div class="sched-row">
                <div class="sched-info" style="flex:1">
                  <div class="cname"><?= htmlspecialchars($payment['client_name']) ?></div>
                  <div class="cmeta"><?= htmlspecialchars($payment['method']) ?> · <?= date('d M', strtotime($payment['payment_date'])) ?></div>
                </div>
                <strong>$<?= number_format((float)$payment['amount'], 2) ?></strong>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
