<div>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo"
           value="<?= old('titulo', esc($tarea['titulo'] ?? '')) ?>">
</div>

<div>
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion"><?= old('descripcion', esc($tarea['descripcion'] ?? '')) ?></textarea>
</div>

<div>
    <label for="fecha_entrega">Fecha de Entrega</label>
    <input type="date" name="fecha_entrega" id="fecha_entrega"
           value="<?= old('fecha_entrega', esc($tarea['fecha_entrega'] ?? '')) ?>">
</div>

<?php $estado = old('estado', $tarea['estado'] ?? 'pendiente'); ?>
<div>
    <label for="estado">Estado</label>
    <select name="estado" id="estado">
        <option value="pendiente" <?= $estado === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="completada" <?= $estado === 'completada' ? 'selected' : '' ?>>Completada</option>
    </select>
</div>