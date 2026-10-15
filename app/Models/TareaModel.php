<?php namespace App\Models;

class TareaModel extends \CodeIgniter\Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'estado'];
    protected $useTimestamps = true;

}