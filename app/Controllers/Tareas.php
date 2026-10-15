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
    public function new()
    {
        return view('Tareas/new');
    }

    public function create()
    {

     $model = new \App\Models\TareaModel;

     $result = $model->insert([
        'usuario_id' => 12,
        'titulo' => $this->request->getPost('titulo'),
        'descripcion' => $this->request->getPost('descripcion'),
        'estado' => $this->request->getPost('estado'),
        'fecha_entrega' => $this->request->getPost('fecha_entrega')
     ]);

      if ($result === false) {
      

      return redirect()->back()
      ->with('errors', $model->errors())
      ->with('warning', 'Datos invalidos');

        } else {
    
     return redirect()->to("/tareas/show/$result")
     ->with('message', 'Tarea creada con éxito');

        }
           }
     public function edit($id)
    {
        $model = new \App\Models\TareaModel;
        $tarea = $model->find($id);

        return view("Tareas/edit", [
            'tarea' => $tarea
      ]);
    }

    public function update($id)
    {
    $model = new \App\Models\TareaModel();
    $model->update($id, [
    'titulo'        => $this->request->getPost('titulo'),
    'descripcion'   => $this->request->getPost('descripcion'),
    'estado'        => $this->request->getPost('estado'),
    'fecha_entrega' => $this->request->getPost('fecha_entrega'),
]);

        return redirect()->to("/tareas/show/$id")
        ->with(`info`, 'Tarea actualizada con éxito');
        

    }
}

