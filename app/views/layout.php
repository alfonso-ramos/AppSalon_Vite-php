<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppSalon</title>
    <?php if (!isset($_ENV['APP_ENV']) || $_ENV['APP_ENV'] === 'dev'): ?>
        <!-- JS y CSS desde Vite Dev Server -->
        <script type="module" src="http://localhost:5174/src/main.js"></script>
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
<body class="bg-gray-100">
    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>
</body>
</html>
