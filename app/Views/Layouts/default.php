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

    <nav>
    <a href="<?= site_url('/') ?>">Inicio</a>

    <?php if (session('usuario_id')): ?>
        Hola, <?= esc(session('nombre')) ?>
        <a href="<?= site_url('perfil') ?>">Perfil</a>
        <a href="<?= site_url('tareas') ?>">Tareas</a>
        <a href="<?= site_url('logout') ?>">Cerrar sesión</a>
    <?php else: ?>
        <a href="<?= site_url('registro') ?>">Registrarse</a>
        <a href="<?= site_url('login') ?>">Iniciar sesión</a>
    <?php endif; ?>



    <?php if (session('rol') === 'administrador'): ?>
        <a href="<?= site_url('usuarios') ?>">Usuarios</a>
    <?php endif; ?> 


   </nav>

   

    <?= $this->renderSection('content') ?>
 
</body>
</html>