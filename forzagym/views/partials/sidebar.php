<?php
$currentPath = parse_url(getUrl())['path'];
function navActive($prefix, $currentPath){
    return $prefix === '/dashboard'
        ? $currentPath === '/dashboard'
        : strpos($currentPath, $prefix) === 0;
}
$user = currentUser();
?>
<aside class="sidebar">
  <div class="sidebar-top">
    <div class="brand-mark">FG</div>
    <div class="brand-name">FORZAGYM</div>
  </div>
  <nav class="sidenav">
    <div class="nav-label">General</div>
    <a class="nav-item <?= navActive('/dashboard', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/dashboard">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg>
      Dashboard
    </a>
    <div class="nav-label">Gestión</div>
    <a class="nav-item <?= navActive('/clients', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/clients">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Clientes
    </a>
    <a class="nav-item <?= navActive('/memberships', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/memberships">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg>
      Membresías
    </a>
    <a class="nav-item <?= navActive('/classes', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/classes">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
      Clases y horarios
    </a>
    <a class="nav-item <?= navActive('/trainers', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/trainers">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6.5 6.5 3 10l3.5 3.5M17.5 6.5 21 10l-3.5 3.5M14 4l-4 16"/></svg>
      Entrenadores
    </a>
    <a class="nav-item <?= navActive('/payments', $currentPath) ? 'active' : '' ?>" href="<?= BASE_URL ?>/payments">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M2 10h20"/><path d="M6 15h4"/></svg>
      Pagos
    </a>
  </nav>
  <div class="sidebar-foot">
    <div class="user-chip">
      <div class="avatar"><?= strtoupper(substr($user['first_name'] ?? 'A', 0, 1)) ?></div>
      <div>
        <div class="name"><?= htmlspecialchars(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? '')) ?></div>
        <div class="role"><?= htmlspecialchars($user['role'] ?? '') ?></div>
      </div>
    </div>
    <form method="POST" action="<?= BASE_URL ?>/logout">
      <button type="submit" class="logout-btn">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Cerrar sesión
      </button>
    </form>
  </div>
</aside>
