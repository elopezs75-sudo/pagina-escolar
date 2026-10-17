<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Tarea</h1>

<?= $this->include('errores') ?>

<a href="<?= site_url('tareas') ?>">&laquo; Volver a la lista</a>

<dl>
    <dt>ID</dt>
    <dd><?= $tarea['id'] ?></dd>

    <dt>Título</dt>
    <dd><?= esc($tarea['titulo']) ?></dd>

    <dt>Descripción</dt>
    <dd><?= esc($tarea['descripcion']) ?></dd>

    <dt>Fecha de entrega</dt>
    <dd><?= esc($tarea['fecha_entrega']) ?></dd>

    <dt>Estado</dt>
    <dd><?= esc($tarea['estado']) ?></dd>
</dl>

<?php if (session('rol') === 'administrador'): ?>
    <a href="<?= site_url("/tareas/edit/{$tarea['id']}") ?>">Editar</a>

    <form method="post" action="<?= site_url("tareas/delete/{$tarea['id']}") ?>"
          onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?');">
        <?= csrf_field() ?>
        <button type="submit">Eliminar</button>
    </form>
<?php endif; ?>

<?= $this->endSection() ?>