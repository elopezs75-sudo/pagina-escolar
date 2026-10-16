<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Nueva Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Nueva Tarea</h1>

<?php if (session()->has('errors')): ?>

    <ul>
           <?php foreach (session('errors') as $error): ?>
            <li><?= $error ?></li>
           <?php endforeach; ?>
    </ul>

    <?php endif; ?>
      

<?= form_open("/tareas/create") ?>



<?= $this->include('Tareas/form') ?>

 <button>Guardar</button>
 <a href="<?= site_url("/tareas") ?>">Cancelar</a>

</form>

<?= $this->endSection() ?>
























