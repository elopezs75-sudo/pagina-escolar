<?php namespace App\Models;

class TareaModel extends \CodeIgniter\Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'titulo', 'descripcion', 'fecha_entrega', 'estado'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'fecha_entrega' => 'required|valid_date',
        'estado' => 'required|in_list[pendiente,completada]'
    ];

    protected $validationMessages = [
        'titulo' => [
            'required' => 'El título es obligatorio.'
        ],
        'descripcion' => [
            'required' => 'La descripción es obligatoria.'
        ],
        'fecha_entrega' => [
            'required' => 'La fecha de entrega es obligatoria.',
            'valid_date' => 'La fecha de entrega debe ser una fecha válida.'
        ]
 
    ];
}