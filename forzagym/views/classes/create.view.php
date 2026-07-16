<?php require base_path('views/partials/header.php'); ?>
<div id="app">
  <?php require base_path('views/partials/sidebar.php'); ?>
  <div class="main">
    <div class="topbar">
      <div>
        <h2><?= $heading ?></h2>
        <div class="sub">Programa una nueva clase</div>
      </div>
    </div>
    <div class="content">
      <a href="<?= BASE_URL ?>/classes" class="back-link">&larr; Volver a clases</a>

      <div class="form-card">
        <form method="POST" action="<?= BASE_URL ?>/classes/create">
          <div class="form-grid">
            <div class="field full">
              <label for="cs-name">Nombre de la clase</label>
              <input id="cs-name" name="name" type="text" value="<?= htmlspecialchars($class['name'] ?? '') ?>">
              <p class="err"><?= $error['name'] ?? '' ?></p>
            </div>
            <div class="field full">
              <label for="cs-trainer">Entrenador</label>
              <select id="cs-trainer" name="trainer_id">
                <option value="">Selecciona un entrenador</option>
                <?php foreach ($trainers as $t): ?>
                  <option value="<?= $t['id'] ?>" <?= (string)($class['trainer_id'] ?? '') === (string)$t['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['first_name'] . ' ' . $t['last_name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <p class="err"><?= $error['trainer_id'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cs-location">Sede</label>
              <input id="cs-location" name="location" type="text" placeholder="FitTrack Downtown" value="<?= htmlspecialchars($class['location'] ?? '') ?>">
              <p class="err"><?= $error['location'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cs-time">Horario</label>
              <input id="cs-time" name="schedule_time" type="time" value="<?= htmlspecialchars($class['schedule_time'] ?? '') ?>">
              <p class="err"><?= $error['schedule_time'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cs-capacity">Capacidad</label>
              <input id="cs-capacity" name="capacity" type="number" min="1" value="<?= htmlspecialchars($class['capacity'] ?? '') ?>">
              <p class="err"><?= $error['capacity'] ?? '' ?></p>
            </div>
            <div class="field">
              <label for="cs-price">Precio ($)</label>
              <input id="cs-price" name="price" type="number" step="0.01" min="0" value="<?= htmlspecialchars($class['price'] ?? '') ?>">
              <p class="err"><?= $error['price'] ?? '' ?></p>
            </div>
          </div>
          <div class="form-actions">
            <a href="<?= BASE_URL ?>/classes" class="btn btn-ghost">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar clase</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>
