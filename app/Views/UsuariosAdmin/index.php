<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Usuarios<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Usuarios</h1>

<?= $this->include('errores') ?>

<p><a href="<?= site_url('usuarios/nuevo') ?>">Nuevo usuario</a></p>

<table border="1" cellpadding="6">
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Activo</th>
        <th>Administrador</th>
        <th>Creado</th>
    </tr>
    <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><a href="<?= site_url('usuarios/' . $u['id']) ?>"><?= esc($u['nombre']) ?></a></td>
            <td><?= esc($u['correo']) ?></td>
            <td><?= $u['activo'] ? 'Sí' : 'No' ?></td>
            <td><?= $u['rol'] === 'administrador' ? 'Sí' : 'No' ?></td>
            <td><?= esc($u['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $pager->simpleLinks('default', 'default_simple') ?>

<?= $this->endSection() ?>