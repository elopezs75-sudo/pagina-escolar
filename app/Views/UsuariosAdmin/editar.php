<?= $this->extend('Layouts/default') ?>

<?= $this->section('title') ?>Editar usuario<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Editar usuario</h1>

<?= $this->include('errores') ?>

<?= form_open('/usuarios/' . $usuario['id'] . '/editar') ?>

    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= old('nombre', esc($usuario['nombre'])) ?>">
    </div>

    <div>
        <label for="email">Correo</label>
        <input type="text" name="email" id="email" value="<?= old('email', esc($usuario['correo'])) ?>">
    </div>

    <div>
        <label for="password">Contraseña (déjala vacía para no cambiarla)</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="repetir">Repetir contraseña</label>
        <input type="password" name="repetir" id="repetir">
    </div>

    <div>
        <label><input type="checkbox" name="activo" value="1" <?= $usuario['activo'] ? 'checked' : '' ?>> Activo</label>
    </div>

    <div>
        <label><input type="checkbox" name="administrador" value="1" <?= $usuario['rol'] === 'administrador' ? 'checked' : '' ?>> Administrador</label>
    </div>

    <button>Guardar</button>
    <a href="<?= site_url('usuarios/' . $usuario['id']) ?>">Cancelar</a>

<?= form_close() ?>

<?= $this->endSection() ?>