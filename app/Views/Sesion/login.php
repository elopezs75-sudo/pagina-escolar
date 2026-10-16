<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Iniciar sesión<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Iniciar sesión</h1>

<?= $this->include('errores') ?>

<?= form_open('/login') ?>

    <div>
        <label for="email">Correo</label>
        <input type="text" name="email" id="email" value="<?= old('email') ?>">
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Entrar</button>

<?= form_close() ?>

<?= $this->endSection() ?>