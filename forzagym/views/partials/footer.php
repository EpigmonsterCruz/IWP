<div class="toast" id="toast"><span class="dot"></span><span id="toast-text">Guardado</span></div>

<script>
  let toastTimer;
  function showToast(msg){
    const t = document.getElementById('toast');
    document.getElementById('toast-text').textContent = msg;
    t.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => t.classList.remove('show'), 2500);
  }

  const flashMessages = {
    created: 'Registro creado correctamente',
    updated: 'Registro actualizado correctamente',
    deleted: 'Registro eliminado correctamente',
  };
  <?php if (isset($_GET['msg']) && array_key_exists($_GET['msg'], ['created'=>1,'updated'=>1,'deleted'=>1])): ?>
    showToast(flashMessages['<?= $_GET['msg'] ?>']);
  <?php endif; ?>
</script>
</body>
</html>
