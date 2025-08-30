
<?php
// Solución rápida: forzar APP_ENV a 'dev' si no está definida
if (!isset($_ENV['APP_ENV'])) {
  $_ENV['APP_ENV'] = 'dev';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salon</title>
    <?php if ($_ENV['APP_ENV'] === 'dev'): ?>
      <!-- JS desde Vite Dev Server -->
      <script type="module" src="http://localhost:5173/frontend/src/main.js"></script>
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
</head>
<body>
    <?= $contenido ?>
</body>
</html>
