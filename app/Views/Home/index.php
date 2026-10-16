<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Inicio<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Bienvenido al organizador de tareas escolares</h1>

<?php if (session('usuario_id')): ?>
    <p>Hola, <?= esc(session('nombre')) ?>. Revisa tus <a href="<?= site_url('tareas') ?>">tareas</a>.</p>
<?php else: ?>
    <p>Inicia sesión o crea una cuenta para empezar.</p>
<?php endif; ?>

<?= $this->endSection() ?>