<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Editar perfil<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Editar perfil</h1>

<?= $this->include('errores') ?>

<?= form_open('/perfil/actualizar') ?>

    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= old('nombre', esc($usuario['nombre'])) ?>">
    </div>

    <div>
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo" value="<?= old('correo', esc($usuario['correo'])) ?>">
    </div>

    <div>
        <label for="password_actual">Contraseña actual (para confirmar)</label>
        <input type="password" name="password_actual" id="password_actual">
    </div>

    <button>Guardar</button>
    <a href="<?= site_url('perfil') ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>