<?php

namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TareaModel();
        $data = $model->findAll();

       
        return view("Tareas/index", ['tareas' => $data]);
    }

    public function show($id)
    {
        $model = new \App\Models\TareaModel();
        $tarea = $model->find($id);

        return view("Tareas/show", ['tarea' => $tarea]);
    }
}