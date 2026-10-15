<?=$this->extend('Layouts/default')?>

<?= $this->section("title") ?>
    tareas
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Tareas</h1>

<a href="<?= site_url("/tareas/new") ?>">Nueva Tarea</a>

<ul>
    <?php foreach($tareas as $tarea): ?>

    <li>
    <a href="<?= site_url("tareas/show/{$tarea['id']}") ?>">
    <?= esc($tarea['titulo']) ?>
    <?= esc($tarea['descripcion']) ?>
    <?= esc($tarea['estado']) ?>
    </a>
    </li>

    <?php endforeach; ?>
    </ul>

<?= $this->endSection() ?>

