<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Registro<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Registro</h1>

<?= $this->include('errores') ?>

<?= form_open('/registro') ?>

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

    <button>Registrarse</button>
    <a href="<?= site_url('/') ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>