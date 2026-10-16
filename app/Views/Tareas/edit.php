<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>editar Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Editar Tarea</h1>

<?php if (session()->has('errors')): ?>

    <ul>
           <?php foreach (session('errors') as $error): ?>
            <li><?= $error ?></li>
           <?php endforeach; ?>
    </ul>

    <?php endif; ?>
      

<?= form_open("/tareas/update/{$tarea['id']}") ?>


<?= $this->include('Tareas/form') ?>
   

 <button>Guardar</button>
 <a href="<?= site_url("/tareas/show/{$tarea['id']}") ?>">Cancelar</a>

</form>

<?= $this->endSection() ?>








