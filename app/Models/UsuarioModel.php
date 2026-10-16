<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table         = 'usuarios';
    protected $allowedFields = ['nombre', 'correo', 'password', 'rol', 'activo'];
    protected $useTimestamps = true;
}