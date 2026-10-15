<?=$this->extend('Layouts/default')?>

<?= $this->section("title") ?>
    tareas
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Tareas</h1>

<ul>
    <?php foreach($tareas as $tarea): ?>

    <li>
    <?= $tarea['id'] ?> 
    <?= $tarea['descripcion'] ?>
    <?= $tarea['estado'] ?>
    
    </li>

    <?php endforeach; ?>
    </ul>

<?= $this->endSection() ?>

