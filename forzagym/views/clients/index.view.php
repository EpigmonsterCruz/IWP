<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub"><?= count($clients) ?> clientes registrados</div>
      </div>
    </div>
    <div class="content">

      <div class="section-head">
        <form method="GET" action="<?= BASE_URL ?>/clients" style="display:flex;gap:8px;">
          <input type="text" name="search" placeholder="Buscar por nombre o correo..." value="<?= htmlspecialchars($search ?? '') ?>"
                 style="padding:9px 13px;border:1.5px solid var(--line);border-radius:8px;font-size:13.5px;min-width:240px;">
          <button type="submit" class="btn btn-ghost btn-sm">Buscar</button>
        </form>
        <div class="toolbar">
          <a href="<?= BASE_URL ?>/clients/create" class="btn btn-primary btn-sm">+ Nuevo cliente</a>
        </div>
      </div>

      <div class="table-card">
        <?php if (empty($clients)): ?>
          <div class="empty-state">
            <strong>No se encontraron clientes</strong>
            <p>Intenta con otra búsqueda o registra un nuevo cliente.</p>
          </div>
        <?php else: ?>
        <table>
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Contacto</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($clients as $client): ?>
              <tr>
                <td>
                  <div class="cell-name"><?= htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) ?></div>
                  <div class="cell-sub">ID #<?= $client['id'] ?></div>
                </td>
                <td>
                  <div><?= htmlspecialchars($client['email']) ?></div>
                  <div class="cell-sub"><?= htmlspecialchars($client['phone']) ?></div>
                </td>
                <td><span class="badge <?= $client['status'] ?>"><?= ucfirst($client['status']) ?></span></td>
                <td>
                  <div class="row-actions">
                    <a class="icon-btn" title="Ver" href="<?= BASE_URL ?>/clients/show?id=<?= $client['id'] ?>">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </a>
                    <a class="icon-btn" title="Editar" href="<?= BASE_URL ?>/clients/edit?id=<?= $client['id'] ?>">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5Z"/></svg>
                    </a>
                    <form class="delete-form" method="POST" action="<?= BASE_URL ?>/clients" onsubmit="return confirm('¿Eliminar a <?= htmlspecialchars($client['first_name']) ?>? Esta acción no se puede deshacer.');">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="<?= $client['id'] ?>">
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
