<?php

namespace App\Controllers;

use App\Entities\Tarea;
use App\Models\UsuarioModel;

class Tareas extends BaseController
{
    private function esAdmin(): bool
    {
        return session('rol') === 'administrador';
    }

    // Devuelve la tarea solo si el usuario puede verla (suya, o es administrador)
    private function buscarTarea($id)
    {
        $model = new \App\Models\TareaModel();
        $tarea = $model->find($id);

        if ($tarea === null) {
            return null;
        }

        $dueno = is_array($tarea) ? $tarea['usuario_id'] : $tarea->usuario_id;

        if (! $this->esAdmin() && (int) $dueno !== (int) session('usuario_id')) {
            return null;
        }

        return $tarea;
    }

    private function estudiantes()
    {
        return (new UsuarioModel())
            ->where('rol', 'estudiante')
            ->where('activo', 1)
            ->orderBy('nombre')
            ->findAll();
    }

    public function index()
    {
        $model = new \App\Models\TareaModel();

        if ($this->esAdmin()) {
            $data = $model->findAll();
        } else {
            $data = $model->where('usuario_id', session('usuario_id'))->findAll();
        }

        return view("Tareas/index", ['tareas' => $data]);
    }

    public function show($id)
    {
        $tarea = $this->buscarTarea($id);

        if ($tarea === null) {
            return redirect()->to('/tareas')->with('errors', ['Tarea no encontrada']);
        }

        return view("Tareas/show", ['tarea' => $tarea]);
    }

    public function new()
    {
        return view('Tareas/new', [
            'tarea' => [
                'titulo'        => '',
                'descripcion'   => '',
                'fecha_entrega' => '',
                'estado'        => '',
            ],
            'estudiantes' => $this->estudiantes(),
        ]);
    }

    public function create()
    {
        $model = new \App\Models\TareaModel;

        $tarea = new Tarea($this->request->getPost());
        $tarea->usuario_id = $this->request->getPost('usuario_id');

        if ($model->insert($tarea)) {
            return redirect()->to("/tareas/show/{$model->insertID}")
                             ->with('message', 'Tarea creada con éxito');
        }

        return redirect()->back()
                         ->with('errors', $model->errors())
                         ->with('warning', 'Datos invalidos')
                         ->withInput();
    }

    public function edit($id)
    {
        $tarea = $this->buscarTarea($id);

        if ($tarea === null) {
            return redirect()->to('/tareas')->with('errors', ['Tarea no encontrada']);
        }

        return view("Tareas/edit", ['tarea' => $tarea]);
    }

    public function update($id)
    {
        if ($this->buscarTarea($id) === null) {
            return redirect()->to('/tareas')->with('errors', ['Tarea no encontrada']);
        }

        $model = new \App\Models\TareaModel();
        $result = $model->update($id, [
            'titulo'        => $this->request->getPost('titulo'),
            'descripcion'   => $this->request->getPost('descripcion'),
            'estado'        => $this->request->getPost('estado'),
            'fecha_entrega' => $this->request->getPost('fecha_entrega'),
        ]);

        if ($result) {
            return redirect()->to("/tareas/show/$id")
                             ->with('message', 'Tarea actualizada con éxito');
        }

        return redirect()->back()
                         ->with('errors', $model->errors())
                         ->with('warning', 'Error al actualizar la tarea')
                         ->withInput();
    }
}