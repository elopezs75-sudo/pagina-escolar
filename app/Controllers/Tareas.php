<?php

namespace App\Controllers;

use App\Entities\Tarea;

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
        return view('Tareas/new', 
        [
        'tarea' => [
            'titulo' => '',
            'descripcion' => '',
            'fecha_entrega' => '',
            'estado' => '']
        ]);
    }

    public function create()
    {

     $model = new \App\Models\TareaModel;

     $tarea = new Tarea($this->request->getPost());

     if ($model->insert($tarea)) {


          return redirect()->to("/tareas/show/{$model->insertID}")
     ->with('message', 'Tarea creada con éxito');
    

        } else {


      return redirect()->back()
      ->with('errors', $model->errors())
      ->with('warning', 'Datos invalidos')
      ->withInput();


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
    $result = $model->update($id, [
    'titulo'        => $this->request->getPost('titulo'),
    'descripcion'   => $this->request->getPost('descripcion'),
    'estado'        => $this->request->getPost('estado'),
    'fecha_entrega' => $this->request->getPost('fecha_entrega'),
]);

   if ($result){

        return redirect()->to("/tareas/show/$id")
        ->with('message', 'Tarea actualizada con éxito');

        
         }else {
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', 'Error al actualizar la tarea')
                ->withInput();
        }

    }
}

