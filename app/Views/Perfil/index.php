<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Perfil<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Perfil</h1>

<dl>
    <dt>Nombre</dt>
    <dd><?= esc($usuario['nombre']) ?></dd>

    <dt>Correo</dt>
    <dd><?= esc($usuario['correo']) ?></dd>
</dl>

<a href="<?= site_url('perfil/editar') ?>">Editar</a>
<a href="<?= site_url('perfil/password') ?>">Cambiar contraseña</a>

<?= $this->endSection() ?>