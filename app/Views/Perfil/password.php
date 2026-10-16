<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Cambiar contraseña<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Cambiar contraseña</h1>

<?= $this->include('errores') ?>

<?= form_open('/perfil/password') ?>

    <div>
        <label for="actual">Contraseña actual</label>
        <input type="password" name="actual" id="actual">
    </div>

    <div>
        <label for="nueva">Nueva contraseña</label>
        <input type="password" name="nueva" id="nueva">
    </div>

    <div>
        <label for="repetir">Repetir nueva contraseña</label>
        <input type="password" name="repetir" id="repetir">
    </div>

    <button>Guardar</button>
    <a href="<?= site_url('perfil') ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>