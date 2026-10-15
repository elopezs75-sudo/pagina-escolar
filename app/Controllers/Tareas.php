<?php

namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        $data = [
            ['id' => 1, 'descripcion' => 'Tarea 1', 'estado' => 'pendiente'],
            ['id' => 2, 'descripcion' => 'Tarea 2', 'estado' => 'completada'],
        ];

        return view("Tareas/index", ['tareas' => $data]);
    }
}