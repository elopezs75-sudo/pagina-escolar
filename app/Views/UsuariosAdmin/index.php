<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Usuario<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Usuario</h1>

<?= $this->include('errores') ?>

<a href="<?= site_url('usuarios') ?>">&lt;&lt; Volver al listado</a>

<dl>
    <dt>Nombre</dt>
    <dd><?= esc($usuario['nombre']) ?></dd>

    <dt>Correo</dt>
    <dd><?= esc($usuario['correo']) ?></dd>

    <dt>Activo</dt>
    <dd><?= $usuario['activo'] ? 'Sí' : 'No' ?></dd>

    <dt>Administrador</dt>
    <dd><?= $usuario['rol'] === 'administrador' ? 'Sí' : 'No' ?></dd>

    <dt>Creado</dt>
    <dd><?= esc($usuario['created_at']) ?></dd>

    <dt>Actualizado</dt>
    <dd><?= esc($usuario['updated_at']) ?></dd>
</dl>

<a href="<?= site_url('usuarios/' . $usuario['id'] . '/editar') ?>">Editar</a>

<?= form_open('/usuarios/' . $usuario['id'] . '/eliminar', ['onsubmit' => "return confirm('¿Seguro que quieres eliminar este usuario?')"]) ?>
    <button>Eliminar</button>
<?= form_close() ?>

<?= $this->endSection() ?>