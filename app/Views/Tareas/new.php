<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Nueva Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Nueva Tarea</h1>

<?= form_open("/tareas/create") ?>

<div>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="">
</div>

 <button>Guardar</button>
 <a href="<?= site_url("/tareas") ?>">Cancelar</a>

</form>

<?= $this->endSection() ?>
























