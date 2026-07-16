<?php $heading = 'Página no encontrada'; ?>
<?php require base_path('views/partials/header.php'); ?>
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:12px;text-align:center;padding:24px;">
    <div class="brand-mark" style="width:52px;height:52px;font-size:22px;">FG</div>
    <h1 style="font-size:26px;margin:6px 0 0;">Error 404</h1>
    <p style="color:var(--muted);font-size:14px;max-width:360px;">La página que buscas no existe o fue movida.</p>
    <a href="<?= BASE_URL ?>/dashboard" class="btn btn-primary" style="margin-top:8px;">Volver al Dashboard</a>
  </div>
<?php require base_path('views/partials/footer.php'); ?>
