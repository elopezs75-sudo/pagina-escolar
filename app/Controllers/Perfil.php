<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    private function usuario()
    {
        return (new UsuarioModel())->find(session('usuario_id'));
    }

    public function index()
    {
        return view('Perfil/index', ['usuario' => $this->usuario()]);
    }

    public function editar()
    {
        return view('Perfil/editar', ['usuario' => $this->usuario()]);
    }

    public function actualizar()
    {
        $id = session('usuario_id');
        $usuario = $this->usuario();

        $reglas = [
            'nombre' => 'required',
            'correo'  => "required|valid_email|is_unique[usuarios.correo,id,{$id}]",
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()
                             ->with('errors', $this->validator->getErrors())
                             ->withInput();
        }

        if (! password_verify($this->request->getPost('password_actual'), $usuario['password'])) {
            return redirect()->back()
                             ->with('errors', ['La contraseña actual no es correcta'])
                             ->withInput();
        }

        $model = new UsuarioModel();
        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'correo' => $this->request->getPost('email'),
        ]);

        session()->set('nombre', $this->request->getPost('nombre'));

        return redirect()->to('/perfil')->with('message', 'Perfil actualizado con éxito');
    }

    public function password()
    {
        return view('Perfil/password');
    }

    public function cambiarPassword()
    {
        $usuario = $this->usuario();

        $reglas = [
            'nueva'   => 'required|min_length[6]',
            'repetir' => 'required|matches[nueva]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()
                             ->with('errors', $this->validator->getErrors());
        }

        if (! password_verify($this->request->getPost('actual'), $usuario['password'])) {
            return redirect()->back()
                             ->with('errors', ['La contraseña actual no es correcta']);
        }

        $model = new UsuarioModel();
        $model->update($usuario['id'], [
            'password' => password_hash($this->request->getPost('nueva'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/perfil')->with('message', 'Contraseña actualizada con éxito');
    }
}