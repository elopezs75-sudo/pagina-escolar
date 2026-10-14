<?php

namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        $datos = [
            ['id' => 1, 'descripcion' => 'Estudiar programación'],
            ['id' => 2, 'descripcion' => 'Realizar tarea de redes']
        ];

        return view('Tareas/index', ['tareas' => $datos]);
    }
}