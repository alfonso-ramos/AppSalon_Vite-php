<?php if ($_ENV['APP_ENV'] === 'dev'): ?>
  <!-- JS desde Vite Dev Server -->
  <script type="module" src="http://localhost:5173/src/main.js"></script>
<?php else: ?>
  <?php
    // Leer manifest.json para insertar los archivos
    $manifestPath = __DIR__ . '/../../../public/build/manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);
    $js = '/build/' . $manifest['src/main.js']['file'];
    $css = '/build/' . $manifest['src/main.js']['css'][0];
  ?>
  <link rel="stylesheet" href="<?= $css ?>">
  <script type="module" src="<?= $js ?>"></script>
<?php endif; ?>
