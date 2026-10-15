<?php namespace App\Models;

class TareaModel extends \CodeIgniter\Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'titulo', 'descripcion', 'fecha_entrega', 'estado'];
    protected $useTimestamps = true;
   
}