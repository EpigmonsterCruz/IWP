<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= count($payments) ?> pagos registrados</div>
      </div>
    </div>
    <div class="content">

      <div class="section-head">
        <h2 style="font-size:0;"></h2>
        <div class="toolbar">
          <a href="<?= BASE_URL ?>/payments/create" class="btn btn-primary btn-sm">+ Nuevo pago</a>
        </div>
      </div>

      <div class="table-card">
        <?php if (empty($payments)): ?>
          <div class="empty-state">
            <strong>Todavía no hay pagos</strong>
            <p>Registra el primer pago de un cliente.</p>
          </div>
        <?php else: ?>
        <table>
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Monto</th>
              <th>Método</th>
              <th>Fecha</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($payments as $p): ?>
              <tr>
                <td class="cell-name"><?= htmlspecialchars($p['client_name']) ?></td>
                <td><strong>$<?= number_format((float)$p['amount'], 2) ?></strong></td>
                <td><?= htmlspecialchars($p['method']) ?></td>
                <td><?= date('d M Y', strtotime($p['payment_date'])) ?></td>
                <td>
                  <div class="row-actions">
                    <a class="icon-btn" title="Ver" href="<?= BASE_URL ?>/payments/show?id=<?= $p['id'] ?>">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </a>
                    <a class="icon-btn" title="Editar" href="<?= BASE_URL ?>/payments/edit?id=<?= $p['id'] ?>">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5Z"/></svg>
                    </a>
                    <form class="delete-form" method="POST" action="<?= BASE_URL ?>/payments" onsubmit="return confirm('¿Eliminar este pago?');">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="<?= $p['id'] ?>">
                      <button type="submit" class="icon-btn danger" title="Eliminar">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
