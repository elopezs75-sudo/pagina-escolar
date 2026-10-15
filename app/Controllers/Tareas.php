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
}git 