<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
</head>
<body>
    <?php if (session()->has('warning')): ?>
        <div class="warning">
            <?= session('warning') ?>
        </div>

    <?php endif; ?>

     <?php if (session()->has('message')): ?>
        <div class="message">
            <?= session('message') ?>
        </div>

    <?php endif; ?>

    <?= $this->renderSection('content') ?>
 
</body>
</html>