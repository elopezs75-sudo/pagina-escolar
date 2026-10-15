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



    <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="">
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"></textarea>
    </div>

    <div>
        <label for="fecha_entrega">Fecha de Entrega</label>
        <input type="date" name="fecha_entrega" id="fecha_entrega" value="">
    </div>

    <div>
        <label for="estado">Estado</label>
        <select name="estado" id="estado">
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
        </select>
    </div>

 <button>Guardar</button>
 <a href="<?= site_url("/tareas") ?>">Cancelar</a>

</form>

<?= $this->endSection() ?>
























