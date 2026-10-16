<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Tareas<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Tareas</h1>

<?= $this->include('errores') ?>

<?php if (session('rol') === 'administrador'): ?>
    <a href="<?= site_url('tareas/new') ?>">Nueva tarea</a>
<?php endif; ?>

<?php if (empty($tareas)): ?>
    <p>No hay tareas para mostrar.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tareas as $tarea): ?>
            <li>
                <a href="<?= site_url("tareas/show/{$tarea['id']}") ?>">
                    <?= esc($tarea['titulo']) ?> -
                    <?= esc($tarea['descripcion']) ?> -
                    <?= esc($tarea['estado']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= $this->endSection() ?>