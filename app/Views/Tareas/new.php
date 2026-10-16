<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Nueva Tarea<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Nueva Tarea</h1>

<?= $this->include('errores') ?>

<?= form_open("/tareas/create") ?>

<?= $this->include('Tareas/form') ?>

<div>
    <label for="usuario_id">Estudiante</label>
    <select name="usuario_id" id="usuario_id">
        <option value="">-- Selecciona --</option>
        <?php foreach ($estudiantes as $e): ?>
            <option value="<?= $e['id'] ?>" <?= old('usuario_id') == $e['id'] ? 'selected' : '' ?>>
                <?= esc($e['nombre']) ?> (<?= esc($e['correo']) ?>)
            </option>
        <?php endforeach; ?>
    </select>
</div>

<button>Guardar</button>
<a href="<?= site_url("/tareas") ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>