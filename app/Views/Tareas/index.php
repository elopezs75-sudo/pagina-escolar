<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Tareas<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Tareas</h1>

<?= $this->include('errores') ?>

<?php if (session('rol') === 'administrador'): ?>
    <p><a href="<?= site_url('tareas/new') ?>">Nueva tarea</a></p>
<?php endif; ?>

<form method="get" action="<?= site_url('tareas') ?>">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" id="buscar" value="<?= esc($buscar) ?>">
    <button>Buscar</button>
</form>

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

<?= $pager->simpleLinks('default', 'default_simple') ?>

<?= $this->endSection() ?>