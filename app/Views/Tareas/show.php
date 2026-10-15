<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Tarea</h1>

<a href="<?= site_url('tareas') ?>">&laquo; Volver a la lista</a>

<dl>
    
    <dt>ID</dt>
    <dd><?= $tarea['id'] ?></dd>

    <dt>Título</dt>
    <dd><?= $tarea['titulo'] ?></dd>

    <dt>Descripción</dt>
    <dd><?= $tarea['descripcion'] ?></dd>

    <dt>Fecha de entrega</dt>
    <dd><?= $tarea['fecha_entrega'] ?></dd>

    <dt>Estado</dt>
    <dd><?= $tarea['estado'] ?></dd>
</dl>

<?= $this->endSection() ?>