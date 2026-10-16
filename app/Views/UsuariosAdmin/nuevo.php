<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Nuevo usuario<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Nuevo usuario</h1>

<a href="<?= site_url('usuarios') ?>">&lt;&lt; Volver al listado</a>

<?= $this->include('errores') ?>

<?= form_open('/usuarios/nuevo') ?>

    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= old('nombre') ?>">
    </div>

    <div>
        <label for="email">Correo</label>
        <input type="text" name="email" id="email" value="<?= old('email') ?>">
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="repetir">Repetir contraseña</label>
        <input type="password" name="repetir" id="repetir">
    </div>

    <button>Guardar</button>
    <a href="<?= site_url('usuarios') ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>